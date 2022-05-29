<?php

declare(strict_types=1);


namespace App\Services;

use App\Models\Stat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class StatService
{

    /**
     * @param $url
     * @return void
     */
    public function process($url): void
    {
        if (Session::exists('user-online')) {
            $statId = Session::get('user-online');

            $stat = $this->statUpdate($statId);

            /*var_dump($stat);
            die();*/

            $statData = [
                'url' => $url,
                'ip' => $this->getIp(),
                'hash' => $stat->hash,
            ];

            $statId = $this->statStore($statData);
            Session::put('user-online', $statId);
        } else {
            $statData = [
                'url' => $url,
                'ip' => $this->getIp(),
            ];

            $statId = $this->statStore($statData);
            Session::put('user-online', $statId);
        }
    }

    /**
     * @param array $statData
     * @return mixed
     */
    private function statStore(array $statData): mixed
    {
        $stat = Stat::create([
            'user_id' => Auth::id() ?? 0,
            'hash' => $statData['hash'] ?? $this->generateHash(),
            'url' => $statData['url'],
            'ip' => $statData['ip'],
            'time_in' => now(),
        ]);

        return $stat->id;
    }

    /**
     * @return string
     */
    private function generateHash(): string
    {
        $randomString = Str::random(32);
        $now = now();

        return Hash::make($randomString . $now);
    }

    /**
     * @param int $statId
     * @return Stat|bool|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|int|object|null
     */
    private function statUpdate(int $statId)
    {
        $stat = Stat::whereId($statId)->first();

        $timeInTimestamp = Carbon::make($stat->time_in)->timestamp;
        $now = now();
        $nowTimestamp = Carbon::make($now)->timestamp;

        $success = $stat->update([
            'time_summary' => $nowTimestamp - $timeInTimestamp,
            'time_out' => $now
        ]);

        return $success ? $stat : $success;
    }

    /**
     * @return string
     */
    private function getIP(): string
    {
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
            $ip = getenv("HTTP_CLIENT_IP");
        } else {
            if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
                $ip = getenv("HTTP_X_FORWARDED_FOR");
            } else {
                if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
                    $ip = getenv("REMOTE_ADDR");
                } else {
                    if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp(
                            $_SERVER['REMOTE_ADDR'],

                            "unknown"
                        )) {
                        $ip = $_SERVER['REMOTE_ADDR'];
                    } else {
                        $ip = "unknown";
                    }
                }
            }
        }
        return ($ip);
    }
}
