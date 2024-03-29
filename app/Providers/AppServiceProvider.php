<?php

namespace App\Providers;

use App\Http\Controllers\Payments\OtherPaymentController;
use App\Http\Controllers\Payments\PayPalController;
use App\Models\Address;
use App\Models\Buy;
use App\Models\BuyBill;
use App\Models\Gender;
use App\Models\Group;
use App\Models\PlayList;
use App\Models\PlayListSample;
use App\Models\Sample;
use App\Models\Sound;
use App\Models\Type;
use App\Services\AddressService;
use App\Services\BuyBillService;
use App\Services\GenderService;
use App\Services\GroupService;
use App\Services\PaymentService;
use App\Services\PlayListService;
use App\Services\SamplesService;
use App\Services\SoundService;
use App\Services\TypeService;
use App\Services\PlayList_SampleService;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GenderService::class, GenderService::class);
        $this->app->bind(Gender::class, Gender::class);
        $this->app->bind(GroupService::class, GroupService::class);
        $this->app->bind(Group::class, Group::class);
        $this->app->bind(SoundService::class, SoundService::class);
        $this->app->bind(Sound::class, Sound::class);
        $this->app->bind(TypeService::class, TypeService::class);
        $this->app->bind(Type::class, Type::class);
        $this->app->bind(PlayListService::class, PlayListService::class);
        $this->app->bind(PlayList::class, PlayList::class);
        $this->app->bind(SamplesService::class, SamplesService::class);
        $this->app->bind(Sample::class, Sample::class);
        $this->app->bind(AddressService::class, AddressService::class);
        $this->app->bind(Address::class, Address::class);
        $this->app->bind(PlayList_SampleService::class, PlayList_SampleService::class);
        $this->app->bind(PlayListSample::class, PlayListSample::class);
        $this->app->bind(BuyBillService::class, BuyBillService::class);
        $this->app->bind(Buy::class, Buy::class);
        $this->app->bind(BuyBill::class, BuyBill::class);
        $this->app->when(PayPalController::class)
          ->needs(PaymentService::class)
          ->give(function () {
              return PaymentService::paypal();
          });
          $this->app->when(OtherPaymentController::class)
          ->needs(PaymentService::class)
          ->give(function () {
              return PaymentService::otherImplementation();
          });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
