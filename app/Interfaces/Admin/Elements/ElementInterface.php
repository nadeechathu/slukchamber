<?php

/**
 * Page Title : Element Admin Interface .
 *
 * Filename : ElementInterface.php
 *
 * Description: Element details
 *
 * @package
 * @category . Admin
 * @version Release: 1.0.0
 * @since File Creation Date: 05/10/2023
 *
 * @author
 * - Development Group :GUI Sri Lanka Team
 * - Company : GUI Solutions Lanka (Pvt) Ltd.
 *
 * @copyright  Copyright © 2023 GUI Sri Lanka.
 *
 *
 */

namespace App\Interfaces\Admin\Elements;

use App\Http\Requests\Admin\Elements\CreateElementRequest;
use App\Http\Requests\Admin\Elements\UpdateElementRequest;
use Exception;
use Illuminate\Http\Request;

interface ElementInterface
{

    /**
     * @return  array    |        | View All elements data
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var
     *
     * @author LahiruS
     * @author Function Creation Date: 05/10/2023
     *
     * View all elements
     * @uses
     *
     * @version 1.0.0
     *
     * @since 05/10/2023
     *
     */
    public function index(Request $request);


    /**
     * @return   view   |        | Create element ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var
     *
     * @author Chamil Pathirana
     * @author Function Creation Date: 06/10/2023
     *
     * Create parameter ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function createUi();

    /**
     * @return  array    |        | Create elements data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var CreateElementRequest $request
     *
     * @author LahiruS
     * @author Function Creation Date: 05/10/2023
     *
     * Create elements data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 05/10/2023
     *
     */
    public function create(CreateElementRequest $request);

    /**
     * @return  view    |        | Update element ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $id
     *
     * @author Chamil Pathirana
     * @author Function Creation Date: 06/10/2023
     *
     * Update element ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 06/10/2023
     *
     */
    public function updateui(Request $id);

    /**
     * @return  array    |        | Update elements data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var UpdateElementRequest $request, $id
     *
     * @author LahiruS
     * @author Function Creation Date: 05/10/2023
     *
     * Update elements data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 05/10/2023
     *
     */
    public function update(UpdateElementRequest $request, $id);


    /**
     * @return  view    |        | Destroy specific element
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $slug
     *
     * @author LahiruS
     * @author Function Creation Date: 05/10/2023
     *
     * Destroy specific element
     * @uses
     *
     * @version 1.0.0
     *
     * @since 05/10/2023
     *
     */
    public function destroy($id);
}
