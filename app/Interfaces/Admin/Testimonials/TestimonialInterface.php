<?php

/**
 * Page Title : Testimonial Admin Interface .
 *
 * Filename : TesttimonialInterface.php
 *
 * Description: Testimonial details
 *
 * @package
 * @category . Admin
 * @version Release: 1.0.0
 * @since File Creation Date: 25/09/2023
 *
 * @author
 * - Development Group :GUI Sri Lanka Team
 * - Company : GUI Solutions Lanka (Pvt) Ltd.
 *
 * @copyright  Copyright © 2020 GUI Solutions Lanka.
 *
 *
 */

namespace App\Interfaces\Admin\Testimonials;

use Exception;
use Illuminate\Http\Request;


use App\Http\Requests\Admin\Testimonials\CreateTestimonialRequest;
use App\Http\Requests\Admin\Testimonials\UpdateTestimonialRequest;

interface TestimonialInterface
{

    /**
     * @return  array    |        | View All testimonials data
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $request
     *
     * @author Chamil Pathirana
     * @author Function Creation Date: 25/09/2023
     *
     * View all testimonials
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2025
     *
     */
    public function index(Request $request);

    /**
     * @return   view   |        | Create testimonial ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var
     *
     * @author Chamil Pathirana
     * @author Function Creation Date: 25/09/2023
     *
     * Create testimonial ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2025
     *
     */
    public function createUi();

    /**
     * @return  array    |        | Create testimonial data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var CreateTestimonialRequest $request
     *
     * @author Chamil Pathirana
     * @author Function Creation Date: 25/09/2023
     *
     * Create testimonial data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2025
     *
     */
    public function create(CreateTestimonialRequest $request);

    /**
     * @return  view    |        | Update testimonial ui load
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var Request $id
     *
     * @author Chamil Pathirana
     * @author Function Creation Date: 25/09/2023
     *
     * Update testimonial ui load
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2025
     *
     */
    public function updateui(Request $id);

    /**
     * @return  array    |        | Update testimonial data store
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var UpdateTestimonialRequest $request, $id
     *
     * @author Chamil Pathirana
     * @author Function Creation Date: 25/09/2023
     *
     * Update testimonial data store
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2025
     *
     */
    public function update(UpdateTestimonialRequest $request, $id);

    /**
     * @return  view    |        | Destroy specific testimonial
     *
     * @throws Exception
     *
     * @category Admin.
     *
     * @var $slug
     *
     * @author Chamil Pathirana
     * @author Function Creation Date: 25/09/2023
     *
     * Destroy specific testimonial
     * @uses
     *
     * @version 1.0.0
     *
     * @since 25/09/2025
     *
     */
    public function destroy($slug);
}
