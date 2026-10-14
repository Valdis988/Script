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
        // Передаємо змінну до представлення
        $clinicInfo = 'Заповніть форму нижче, щоб записати вашого улюбленця на прийом. Наші адміністратори зв\'яжуться з вами для підтвердження часу.';

        return view('site.booking', ['clinicInfo' => $clinicInfo]);
    }

    public function bookingStore(BookingRequest $request)
    {
        // Повертаємо сторінку підтвердження з валідними даними
        return view('site.booking-confirm', $request->validated());
    }


}

