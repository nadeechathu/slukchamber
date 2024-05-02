<?php

namespace App\Services\Mails;

use App\Enums\CategoryTypesEnum;
use Illuminate\Http\Request;

//interfaces
use App\Interfaces\Mails\MailInterface;
use App\Mail\ContactEmail;
use Exception;
use Log;
use Illuminate\Support\Facades\Mail;
use App\Services\Admin\Configurations\ConfigurationService;

class MailService implements MailInterface
{

    private ConfigurationService $configurationService;

    public function __construct(ConfigurationService $configurationService)
    {
       $this->configurationService = $configurationService;
    }

    /**
     * Display a listing of posts.
     */
    public function contactMail($inquiry)
    {

        Log::channel('email_log')->info("[Inquiry Placed Email LOG] ====> Received request to send inquiry placed email from the  == ".$inquiry->full_name);
        
        try {

            // send mail to customer
            $details = array(
                'inquiry' => $inquiry,
                'admin_alert' => 0
            );
         
            Mail::to($inquiry->inquiry_email)->send(new ContactEmail($details));

            //send mail to admin
            $detailsToAdmin = array(
                'inquiry' => $inquiry,
                'admin_alert' => 1
            );

           $adminEmails = $this->configurationService->getEmailConfiguration();

           if($adminEmails != null) {

              $emailArray = explode(',', $adminEmails->configuration_value);

              foreach($emailArray as $adminEmail) {

                Mail::to($adminEmail)->send(new ContactEmail($detailsToAdmin));
              }
           }
         

        } catch(Exception $exception) {

            Log::channel('email_log')->info("[Inquiry Placed Email LOG] ====>  Error occured when sending inquiry placed email == ".$exception->getMessage().' - line - '.$exception->getLine());

            return $exception;
        }

        Log::channel('email_log')->info("[Inquiry Placed Email LOG] ====> Email Send Successfull to == ".$inquiry->inquiry_email);
        
    }

}
