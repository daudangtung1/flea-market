<?php

namespace App\Services;

use App\Models\User;
use App\Models\Postal;
use App\Models\Bank;
use Exception;
use Illuminate\Support\Facades\DB;

class RegisterService
{
    public function __construct(User $userModel, Bank $bankModel, Postal $postalModel)
    {
        $this->userModel = $userModel;
        $this->bankModel = $bankModel;
        $this->postalModel = $postalModel;
    }

    public function registerDownloadMember($request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only(['first_name', 'last_name', 'email', 'password', 'notification_status']);

            $user = $this->userModel->create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'role' => $this->userModel::DOWNLOAD_MEMBER,
                'notification_status' => $data['notification_status'],
            ]);

            if (!$user) {
                DB::rollBack();
                dd('fail to create user');
            }

            DB::commit();
            $data_login = ['email' => $data['email'], 'password' => $data['password']];
            return $data_login;
        } catch (Exception $e) {
            DB::rollback();
            dd($e);
        }
    }

    public function registerAffiliateMember($request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only(['first_name', 'last_name', 'email', 'password', 'notification_status', 'postal_code', 'prefecture', 'city', 'address', 'phone', 'bank_name', 'branch', 'account', 'account_number']);
            $user = $this->userModel->create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'role' => $this->userModel::AFFILIATE_MEMBER,
                'phone' => $data['phone'],
                'notification_status' => $data['notification_status']
            ]);

            $bank = $this->bankModel->create([
                'user_id' => $user->id,
                'bank_name' => $data['bank_name'],
                'branch' => $data['branch'],
                'account' => $data['account'],
                'account_number' => $data['account_number'],
            ]);

            $postal = $this->postalModel->create([
                'user_id' => $user->id,
                'postal_code' => $data['postal_code'],
                'prefecture' => $data['prefecture'],
                'city' => $data['city'],
                'address' => $data['address'],
            ]);

            if (!$user || !$bank || !$postal) {
                DB::rollBack();
                dd('Create user fail!');
            }

            DB::commit();
            $data_login = ['email' => $data['email'], 'password' => $data['password']];
            return $data_login;
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }
}
