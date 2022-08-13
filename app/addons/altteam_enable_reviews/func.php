<?php

/*****************************************************************************
 * This is a commercial software, only users who have purchased a  valid
 * license and accepts the terms of the License Agreement can install and use
 * this program.
 *----------------------------------------------------------------------------
 * @copyright  LCC Alt-team: https://www.alt-team.com
 * @module     "Alt-team: Enabled All Reviews"
 * @license    https://www.alt-team.com/addons-license-agreement.html
 ****************************************************************************/


if (!defined('BOOTSTRAP')) { die('Access denied'); }

use Tygh\Registry;

//  [HOOKs]
function fn_altteam_enable_reviews_update_product_post(&$product_data, $product_id)
{

    if (empty($product_data['discussion_type'])) {

        $default_status = Registry::get('addons.altteam_enable_reviews.default_status');

        $product_data['discussion_type'] = $default_status;
    }
}

function fn_altteam_enable_reviews_get_discussion($object_id, $object_type, &$discussion)
{

    //  hardcode. Add default value for a new product
    if (empty($discussion) && $_REQUEST['dispatch'] == 'products.add') {
        
        $default_status = Registry::get('addons.altteam_enable_reviews.default_status');

        $discussion['type'] = $default_status;
    }
}

//  [/HOOKs]

function fn_altteam_enable_reviews_generate_info()
{

    $return = '';

    $return .= '<div class="control-group setting-wide altteam_enable_reviews ">';


        $return .= '<label class="control-label">';
        $return .= __("click_link_below") . ":" . "<br /><br />";
        $return .= '</label>';

        $return .= '<div class="controls">';
        //  change value for all products
        $return .= "&nbsp;&nbsp;&nbsp;&nbsp;" .
                    "<a href='" . fn_url("altteam_enable_reviews.change.B") . "' target='_blank'>" . __("er_enable") .
                    "&nbsp;" .  __("communication") . "&nbsp;" . __("and")   . "&nbsp;" .  __("rating")  . "</a>" .
                    "<br /><br />";

        $return .= "&nbsp;&nbsp;&nbsp;&nbsp;" .
                    "<a href='" . fn_url("altteam_enable_reviews.change.C") . "' target='_blank'>" . __("er_enable") .
                    "&nbsp;" . __("communication")  . "</a>" .
                    "<br /><br />";

        $return .= "&nbsp;&nbsp;&nbsp;&nbsp;" .
                    "<a href='" . fn_url("altteam_enable_reviews.change.R") . "' target='_blank'>" . __("er_enable") .
                    "&nbsp;" . __("rating")  . "</a>" .
                    "<br /><br />";

        $return .= "&nbsp;&nbsp;&nbsp;&nbsp;" .
                    "<a href='" . fn_url("altteam_enable_reviews.change.D") . "' target='_blank'>" . __("er_enable") .
                    "&nbsp;" . __("disabled")  . "</a>";
        //  /change value for all products
        $return .= '</div>';
    
    $return .= '</div>';

    return $return;
}