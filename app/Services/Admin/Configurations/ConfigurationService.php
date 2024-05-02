<?php

namespace App\Services\Admin\Configurations;

use Illuminate\Support\Facades\Hash;

//requests
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Configurations\CreateConfigurationRequest;
use App\Http\Requests\Admin\Configurations\UpdateConfigurationRequest;

//models
use App\Models\Configuration;

//interfaces
use App\Interfaces\Admin\Configurations\ConfigurationInterface;

class ConfigurationService implements ConfigurationInterface
{

    /**
     * Display a listing of roles.
     */
    public function index(Request $request)
    {
        
        $configurations = Configuration::getConfigurationsForFilters($request);

        return $configurations;
    }

    /**
     * Store a newly created role in storage.
     */
    public function create(CreateConfigurationRequest $request)
    {

        $configuration = new Configuration();

        $configuration->configuration_key = $request->configuration_key;
        $configuration->configuration_value = $request->configuration_value;
        $configuration->enabled_on_api = $request->enabled_on_api;
        $configuration->type = $request->type;
        $configuration->save();

        return $configuration;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConfigurationRequest $request, $id)
    {

        $configuration = Configuration::find($id);

        $configuration->configuration_key = $request->configuration_key;
        $configuration->configuration_value = $request->configuration_value;
        $configuration->enabled_on_api = $request->enabled_on_api;
        $configuration->type = $request->type;
        $configuration->save();

        return $configuration;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $deletedCount = Configuration::where('id', $id)->delete();

        return $deletedCount;

    }

    /**
     * Get configurations by type
     */
    public function getConfigurationsForType($type)
    {

        $configurations = Configuration::where('type',$type)->where('status',1)->get();

        return $configurations;

    }

    /**
     * Add component to configuration
     */
    public function addComponentToConfiguration($componentId, $configurationId){

        Configuration::where('id',$configurationId)->update(['mapping_id' => $componentId]);


    }

        /**
     * Get email configuration
     */
    public function getEmailConfiguration() {

       $emailConfiguration = Configuration::where('configuration_key', 'ADMIN_INQUIRY_EMAILS')->first();

        return $emailConfiguration;
    }

}

