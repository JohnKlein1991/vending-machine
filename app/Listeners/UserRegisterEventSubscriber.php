<?php


namespace App\Listeners;


use App\Models\TempSumInVmModel;
use App\Models\WalletModel;

class UserRegisterEventSubscriber
{
    public function onUserRegister($event)
    {
        $userId = $event->user->id;
        $dataForNewWallet = [
            'user_id' => $userId,
            'one_rub' => 10,
            'two_rub' => 30,
            'five_rub' => 20,
            'ten_rub' => 15,
        ];
        $wallet = new WalletModel($dataForNewWallet);
        $wallet->save();

        $dataForNewTempSum = [
            'user_id' => $userId,
            'one_rub' => 0,
            'two_rub' => 0,
            'five_rub' => 0,
            'ten_rub' => 0,
        ];
        $wallet = new TempSumInVmModel($dataForNewTempSum);
        $wallet->save();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Registered',
            'App\Listeners\UserRegisterEventSubscriber@onUserRegister'
        );
    }
}