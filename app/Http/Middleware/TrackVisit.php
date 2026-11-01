<?php

namespace App\Http\Middleware;

use App\Models\Tracker;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class TrackVisit
{

    private const EXCLUDED = ['stats', 'stats/*', 'up', 'favicon.ico'];

    public function handle(Request $request, Closure $next): Response
    {

        $response = $next($request);

        if (! $request->is(...self::EXCLUDED)) {
            $this->track($request, $response);
        }

        return $response;
    }

    private function track(Request $request, Response $response): void
    {
        try {
            Tracker::create([
                'page'       => Str::limit($request->path(), 255, ''),
                'ip'         => $request->ip() ?? '0.0.0.0',
                'status'     => $response->getStatusCode(),
                'method'     => $request->method(),
                'route_name' => $request->route()?->getName(), // null для 404
                'device'     => $this->detectDevice((string) $request->userAgent()),
                'meta'       => $this->collectMeta($request) ?: null,
                'visited_at' => now(),
            ]);
        } catch (Throwable $e) {

            report($e);
        }
    }


    private function collectMeta(Request $request): array
    {
        $meta = [
            'user_agent' => Str::limit((string) $request->userAgent(), 500, ''),
            'referer'    => Str::limit((string) $request->header('referer'), 500, ''),

            'query'      => array_filter(
                $request->query(),
                fn ($value) => $value !== null && $value !== ''
            ),
        ];


        foreach ($request->route()?->parameters() ?? [] as $param) {
            if ($param instanceof Model) {
                $meta['object_type'] = class_basename($param);
                $meta['object_id']   = $param->getKey();
                break;
            }
        }

        return array_filter(
            $meta,
            fn ($value) => $value !== null && $value !== '' && $value !== []
        );
    }


    private function detectDevice(string $ua): string
    {
        return match (true) {
            $ua === '' || preg_match('/bot|crawl|spider|curl|wget/i', $ua) === 1 => 'bot',
            preg_match('/ipad|tablet|android(?!.*mobile)/i', $ua) === 1          => 'tablet',
            preg_match('/mobi|iphone|ipod|android/i', $ua) === 1                 => 'mobile',
            default                                                              => 'desktop',
        };
    }
}
