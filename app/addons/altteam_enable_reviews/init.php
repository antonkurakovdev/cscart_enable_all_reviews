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

fn_register_hooks(
    'update_product_post',
    'get_discussion'
);
