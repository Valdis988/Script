<?php
namespace App\Http\Controllers;
use App\Http\Requests\EntryRequest;
use App\Http\Requests\BookingRequest;
class SiteController extends Controller
{
    public function say(string $message = 'Привіт')
    {
        return view('site.say', ['message' => $message]);
    }

    public function entry()
    {
        return view('site.entry');
    }

    public function entryStore(EntryRequest $request)
    {
        return view(
            'site.entry-confirm',
            $request->validated()
        );
    }

    public function booking()
    {

        $services = [
            'Консультація та огляд',
            'Вакцинація та чипування',
            'Хірургія',
            'УЗД та аналізи'
        ];


        $minDate = now()->format('Y-m-d');

        return view('site.booking', [
            'services' => $services,
            'minDate' => $minDate
        ]);
    }

    public function bookingStore(BookingRequest $request)
    {
        
        return view('site.booking-confirm', $request->validated());
    }


}

