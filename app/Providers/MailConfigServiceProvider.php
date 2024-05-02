<?php

namespace App\Providers;

use App\Models\Configuration;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //Registers the mail configurations from the table configurations. Default env mail configurations will be ignored.
        if (Schema::hasTable('configurations')) {

            $mailSettings = Configuration::whereIn('configuration_key',['MAIL_MAILER','MAIL_HOST','MAIL_PORT','MAIL_USERNAME','MAIL_PASSWORD','MAIL_ENCRYPTION','MAIL_FROM_ADDRESS','MAIL_FROM_NAME'])->get()->groupBy('configuration_key');

            if (sizeof($mailSettings) > 0){

                
                $config = array(
                    'driver'     => isset($mailSettings['MAIL_MAILER']) ? $mailSettings['MAIL_MAILER'][0]->configuration_value : null,
                    'host'       => isset($mailSettings['MAIL_HOST']) ? $mailSettings['MAIL_HOST'][0]->configuration_value : null,
                    'port'       => isset($mailSettings['MAIL_PORT']) ? $mailSettings['MAIL_PORT'][0]->configuration_value : null,
                    'from'       => [
                                    'address' => isset($mailSettings['MAIL_FROM_ADDRESS']) ? $mailSettings['MAIL_FROM_ADDRESS'][0]->configuration_value : null, 
                                    'name' =>  isset($mailSettings['MAIL_FROM_NAME']) ? $mailSettings['MAIL_FROM_NAME'][0]->configuration_value : null
                                ],
                    'encryption' => isset($mailSettings['MAIL_ENCRYPTION']) ? $mailSettings['MAIL_ENCRYPTION'][0]->configuration_value : null,
                    'username'   => isset($mailSettings['MAIL_USERNAME']) ? $mailSettings['MAIL_USERNAME'][0]->configuration_value : null,
                    'password'   => isset($mailSettings['MAIL_PASSWORD']) ? $mailSettings['MAIL_PASSWORD'][0]->configuration_value : null,
                    'sendmail'   => '/usr/sbin/sendmail -bs',
                    'pretend'    => false,
                );
                
                //setting the mail details to config
                Config::set('mail', $config);

            }
        }
    }
}
