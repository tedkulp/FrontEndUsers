<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: FrontEndUsers (c) 2008 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to allow management of frontend
#  users, and their login process within a CMS Made Simple powered 
#  website.
# 
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# However, as a special exception to the GPL, this software is distributed
# as an addon module to CMS Made Simple.  You may not use this software
# in any Non GPL version of CMS Made simple, or in any version of CMS
# Made simple that does not indicate clearly and obviously in its admin 
# section that the site was built with CMS Made simple.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------
#END_LICENSE
if( !isset($gCms) ) return;

$smarty->assign('formstart',$this->CGCreateFormStart($id,'admin_set_auth'));
$smarty->assign('formend',$this->CreateFormEnd());

$smarty->assign('support_lostun',$this->GetPreference('support_lostun',1));
$smarty->assign('support_lostpw',$this->GetPreference('support_lostpw',1));

$smarty->assign('pwfldlen',$this->GetPreference('passwordfldlength'));
$smarty->assign('minpwlen',$this->GetPreference('min_passwordlength'));
$smarty->assign('maxpwlen',$this->GetPreference('max_passwordlength'));
$smarty->assign('unfldlen',$this->GetPreference('usernamefldlength'));
$smarty->assign('minunlen',$this->GetPreference('min_usernamelength'));
$smarty->assign('maxunlen',$this->GetPreference('max_usernamelength'));
$smarty->assign('pwhashalgo',$this->GetPreference('pwhashalgo'));
$smarty->assign('cookie_keepalive',$this->GetPreference('cookie_keepalive',0));
$smarty->assign('usecookiestoremember',$this->GetPreference('usecookiestoremember'));
$smarty->assign('cookiename',$this->GetPreference('cookiename'));
$smarty->assign('username_is_email',$this->GetPreference('username_is_email'));
$smarty->assign('allow_duplicate_emails',$this->GetPreference('allow_duplicate_emails'));
$smarty->assign('allow_duplicate_reminders',$this->GetPreference('allow_duplicate_reminders'));

$smarty->assign('signin_button',$this->GetPreference('signin_button',$this->Lang('login')));
$smarty->assign('required_field_marker',$this->GetPreference('required_field_marker','*'));
$smarty->assign('required_field_color',$this->GetPreference('required_field_color','blue'));
$smarty->assign('hidden_field_marker',$this->GetPreference('hidden_field_marker','!!'));
$smarty->assign('hidden_field_color',$this->GetPreference('hidden_field_color','green'));
$smarty->assign('thumbnail_size',$this->GetPreference('thumbnail_size',75));

$smarty->assign('secure_field_marker',$this->GetPreference('secure_field_marker','^^'));
$smarty->assign('secure_field_color',$this->GetPreference('secure_field_color','yellow'));

$smarty->assign('pageidforgotpasswd',$this->GetPreference('pageidforgotpasswd'));
$smarty->assign('pageid_changesettings',$this->GetPreference('pageid_changesettings'));
$smarty->assign('pageid_login',$this->GetPreference('pageid_login'));
$smarty->assign('pageid_logout',$this->GetPreference('pageid_logout'));
$smarty->assign('pageid_afterverify',$this->GetPreference('pageid_afterverify'));
$smarty->assign('pageid_afterchangesettings',$this->GetPreference('pageid_afterchangesettings'));

$algos = array( 'md5' => 'md5', 'sha256' => 'sha256' );
$smarty->assign('input_pwhashalgo',
		$this->CreateInputDropDown( $id, 'pwhashalgo', $algos, -1,
					    $this->GetPreference('pwhashalgo')));

$cgecom = cge_utils::get_module('CGEcommerceBase');
$selfreg = cge_utils::get_module('SelfRegistration');
if( $cgecom && $selfreg && $selfreg->GetPreference('allowpaidregistration') )
  {
    $opts = array();
    $opts['none'] = $this->Lang('none');
    $opts['delete'] = $this->Lang('delete_user');
    $opts['expire'] = $this->Lang('expire_user');
    $smarty->assign('ecommerce_actions',$opts);
    $smarty->assign('ecomm_ordercancelled',$this->GetPreference('ecomm_ordercancelled','none'));
    $smarty->assign('ecomm_orderdeleted',$this->GetPreference('ecomm_orderdeleted','none'));
    $smarty->assign('ecomm_paidregistration',$this->GetPreference('ecomm_paidregistration',0));
  }

echo $this->ProcessTemplate('admin_authtab.tpl');
#
# EOF
#
?>
