<?php

/**
 * Page Title : Configuration Admin Interface .
 *
 * Filename : ConfigurationInterface.php
 *
 * Description: Configuration details
 *
 * @package
 * @Configuration . Admin
 * @version Release: 1.0.0
 * @since File Creation Date: 06/10/2023
 *
 * @author
 * - Development Group :GUI Sri Lanka Team
 * - Company : GUI Solutions Lanka (Pvt) Ltd.
 *
 * @copyright  Copyright © 2023 GUI Sri Lanka.
 *
 *
 */

namespace App\Interfaces\Admin\Configurations;

use App\Http\Requests\Admin\Configurations\CreateConfigurationRequest;
use App\Http\Requests\Admin\Configurations\UpdateConfigurationRequest;
use Exception;
use Illuminate\Http\Request;

interface ConfigurationInterface
{

    /**
     * @return  array    |        | View All Configuration data
     *
     * @throws Exception
     *
     * @Configuration Admin.
     *
     * @var Request $request
     *
     * @author LahiruS
     * @author Function Creation Date: 06/10/2023
     *
     * View all Configuration
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function index(Request $request);


    /**
     * @return  array    |        | Create Configuration data store
     *
     * @throws Exception
     *
     * @Configuration Admin.
     *
     * @var CreateConfigurationRequest $request
     *
     * @author LahiruS
     * @author Function Creation Date: 06/10/2023
     *
     * Create Configuration data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function create(CreateConfigurationRequest $request);


    /**
     * @return  array    |        | Update Configuration data store
     *
     * @throws Exception
     *
     * @Configuration Admin.
     *
     * @var UpdateConfigurationRequest $request, $id
     *
     * @author LahiruS
     * @author Function Creation Date: 06/10/2023
     *
     * Update Configuration data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function update(UpdateConfigurationRequest $request, $id);


    /**
     * @return  view    |        | Destroy specific Configuration
     *
     * @throws Exception
     *
     * @Configuration Admin.
     *
     * @var $id
     *
     * @author LahiruS
     * @author Function Creation Date: 06/10/2023
     *
     * Destroy specific Configuration
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function destroy($id);

    /**
     * @return  view    |        | Get configuration by type
     *
     * @throws Exception
     *
     * @Configuration Admin.
     *
     * @var $id
     *
     * @author LahiruS
     * @author Function Creation Date: 07/11/2023
     *
     * Get configuration by type
     * @uses
     *
     * @version 1.0.0
     *
     * @since 07/11/2023
     *
     */

    public function getConfigurationsForType($type);

    /**
     * @return  view    |        | Add component to configuration
     *
     * @throws Exception
     *
     * @Configuration Admin.
     *
     * @var $id
     *
     * @author LahiruS
     * @author Function Creation Date: 07/11/2023
     *
     * Add component to configuration
     * @uses
     *
     * @version 1.0.0
     *
     * @since 07/11/2023
     *
     */

    public function addComponentToConfiguration($componentId, $configurationId);
}
