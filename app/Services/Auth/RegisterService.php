<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Models\NotificationStatus;
use App\Models\Postal;
use App\Models\Bank;
use App\Models\UploadMemberUser;
use Exception;
use Illuminate\Support\Facades\DB;

class RegisterService
{
    public function __construct(User $userModel, NotificationStatus $statusModel, UploadMemberUser $uploadMemberUserModel, Bank $bankModel, Postal $postalModel)
    {
        $this->userModel = $userModel;
        $this->statusModel = $statusModel;
        $this->uploadMemberUserModel = $uploadMemberUserModel;
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
            ]);

            $status = $this->statusModel->create([
                'user_id' => $user->id,
                'notification_status' => $data['notification_status'],
            ]);

            if (!$user || !$status) {
                DB::rollBack();
                dd('fail to create user');
            }

            DB::commit();
            $data_login = ['email' => $data['email'], 'password' => $data['password']];
            return $data_login;
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    public function registerUploadMember($request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only(['first_name', 'last_name', 'email', 'password', 'username', 'description', 'homepage_url', 'fb_url', 'twitter_url', 'blog_url', 'country', 'bank_name', 'branch', 'account', 'account_number', 'phone', 'postal_code', 'prefecture', 'city', 'address']);

            $user = $this->userModel->create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'role' => $this->userModel::UPLOAD_MEMBER,
                'phone' => $data['phone'],
            ]);

            $uploadMemberUser = $this->uploadMemberUserModel->create([
                'user_id' => $user->id,
                'username' => $data['username'],
                'description' => $data['description'],
                'homepage_url' => $data['homepage_url'],
                'fb_url' => $data['fb_url'],
                'twitter_url' => $data['twitter_url'],
                'blog_url' => $data['blog_url'],
                'country' => $data['country'],
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

            if (!$user || !$uploadMemberUser || !$bank || !$postal) {
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
            ]);

            $status = $this->statusModel->create([
                'user_id' => $user->id,
                'notification_status' => $data['notification_status'],
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

            if (!$user || !$bank || !$status || !$postal) {
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
