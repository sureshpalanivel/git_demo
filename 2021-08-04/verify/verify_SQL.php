
<?php 



/* SQL */

/* GLOBAL  */

SET GLOBAL FOREIGN_KEY_CHECKS=0;
SET GLOBAL FOREIGN_KEY_CHECKS=1;


/* GroupBY  & COUNT  & DATE FORMAT*/

select convert(ord.order_date,DATE) as ord_date, count(DISTINCT(ord.account_id)) as visitor_count from `orders` as `ord` where `ord`.`supplier_id` = 1 and `ord`.`status` = 1 and `ord`.`payment_status` = 1 and `ord`.`order_status_id` = 1 and `ord`.`is_deleted` = 0 and date(`ord`.`order_date`) <= '2018-10-05 10:16:20' and date(`ord`.`order_date`) >= '2018-09-05 10:16:20' group by `ord`.`account_id`, `ord_date` order by `ord`.`order_date` asc


  $order = DB::table(Config::get('tables.ORDERS').' as ord')  
					->where('ord.supplier_id', $supplier_id)
					->where('ord.status', Config::get('constants.ON'))
					->where('ord.payment_status', Config::get('constants.ON'))
					->where('ord.order_status_id', Config::get('constants.ON'))
					->where('ord.is_deleted', Config::get('constants.OFF'))				
					->selectRaw('convert(ord.order_date,DATE) as ord_date, count(DISTINCT(ord.account_id)) as visitor_count')
				    ->groupby('ord.order_date','ord.account_id'); 


MerchantOrders Line Number 149 

/* REGEXP */
$search_term = str_replace(' ', '|', $search_term);
   $s->where('msm.store_name', 'REGEXP', $search_term);

/* Verify */

update deal_stores as t1, (select a.store_id,b.city_id from deal_stores as a inner join address_mst as b on a.store_id=b.relative_post_id and b.post_type=3 and b.address_type=1) as t2 set t1.locality_id=t2.city_id where t1.store_id=t2.store_id


CREATE DEFINER=`root`@`localhost` FUNCTION `calculate_distance`(`ilat` DOUBLE, `ilng` DOUBLE, `clat` DOUBLE, `clng` DOUBLE) RETURNS double
    NO SQL
BEGIN
 
return 3956  2  ASIN(SQRT( POWER(SIN((ilat - clat)   pi()/180 / 2), 2) +COS(ilat  pi()/180)  COS(clat  pi()/180)  POWER(SIN((ilng -clng)  pi()/180 / 2), 2) ));
END

$offer->url = route('user.deals.details', ['deal_slug'=>$offer->deal_slug, 'deal_code'=>$offer->offer_code]);
				$offer->distance = $this->distanceCalculation($lat, $lng, $offer->geolatitute, $offer->geolongitute, $distance_unit);


/* Copy Table From one db to another db */
   INSERT INTO cashbackbid_v5.location_localities SELECT * from cashbackbid_v3.location_localities;
   
 /* FIND_IN_SET */   
   ->whereRaw('FIND_IN_SET(?,countries)', [$country_id]);
   OR
   SELECT FIND_IN_SET("c", "a,b,c,d,e");

/* DATE */
   $categoty->created_on = !empty($categoty->created_on) ? date('d-M-Y H:i:s', strtotime($categoty->created_on)) : null;

/* IF */
	->select('ft.ft_id','ft.transaction_id','ft.from_account_id','ft.from_account_wallet_id','ft.to_account_wallet_id','ft.transfered_on','ft.to_account_id','fum.uname as from_uname','tum.uname as to_uname','ft.amount','ft.paidamt','ft.status','ft.is_deleted','ft.currency_id','c.code as currency_code','c.currency_symbol',DB::Raw("CONCAT_WS('',fud.first_name,fud.last_name) as from_fullname"),DB::Raw("CONCAT_WS('',tud.first_name,tud.last_name) as to_fullname"),DB::Raw('if(ft.from_account_id>0,ft.from_account_id,ft.to_account_id ) as account'),
		  DB::Raw("if(ft.from_account_id>0,(select wallet from ".config('tblconstants.WALLET_LANG')." where wallet_id=ft.from_account_wallet_id and lang_id='".config('app.locale_id')."'),(select wallet from 
		  ".config('tblconstants.WALLET_LANG')." where wallet_id=ft.to_account_wallet_id and lang_id='".config('app.locale_id')."')) as wallet_name"))

/* FROM */
DB::table($this->config->get('tbl.DEAL_PROPERTIES'))
                ->where('pb_deal_id', $deal_id)
                ->where('is_deleted', $this->config->get('constants.OFF'))
				//->whereNotIn('property_id',array_keys($properties))
                ->update(['is_deleted'=>$this->config->get('constants.ON')]);
				
		DB::table($this->config->get('tbl.DEAL_PROPERTY_VALUES'))
				->whereIn('dp_id', function($dp) use($deal_id){
					$dp->from(($this->config->get('tbl.DEAL_PROPERTIES')))
					   ->where('pb_deal_id', $deal_id)
					   ->where('is_deleted', $this->config->get('constants.ON'))
					   ->select('dp_id')
					   ->get();
					})
				->where('is_deleted', $this->config->get('constants.OFF'))
				->update(['is_deleted'=>$this->config->get('constants.ON')]);
		  
/* SUB QUERY */

    ->select('ft.from_account_id','ft.to_account_id', 'fum.uname as from_uname','fum.user_code as from_user_code', 'tum.uname as to_uname', 'tum.user_code as to_user_code', 'ft.amount', 'ft.paidamt', 'ft.status', 'ft.is_deleted', 'ft.currency_id', 'cur.currency as currency_code', 'cur.currency_symbol', DB::Raw("CONCAT_WS('',fud.firstname,fud.lastname) as from_fullname"), DB::Raw("CONCAT_WS('',tud.firstname,tud.lastname) as to_fullname"), 'ft.transfered_on',  'ft.transaction_id', DB::Raw("if(ft.from_account_id='".$account_id."',(select wallet from ".$this->config->get('tables.WALLET_LANG')." where wallet_id=ft.from_account_ewallet_id and lang_id='".$this->config->get('app.locale_id')."'),(select wallet from ".$this->config->get('tables.WALLET_LANG')." where wallet_id=ft.to_account_ewallet_id and lang_id='".$this->config->get('app.locale_id')."')) as wallet_name"))
	

	->select(DB::Raw('am.account_id,am.signedup_on,am.uname,am.email,am.activated_on,am.status,am.block,am.block_login,ast.is_account_verified,concat_ws(" ",ad.first_name,ad.last_name) as fullname,concat_ws(" ",lcu.phonecode,am.mobile) as mobile,lcu.country,(select count(*) from '.config('tbl.MERCHANT_MST').' mm where mm.created_by = am.account_id) as merchat_cnt,(select count(*) from '.config('tbl.MERCHANT_STORE_MST').' msm inner join '.config('tbl.MERCHANT_MST').' as mm on msm.mrid = mm.mrid where mm.created_by = am.account_id) as store_cnt')) 
	->orderBy('am.signedup_on', 'DESC')  
	->get();
	
	// staff count
	$query = DB::table($this->config->get('tbl.MERCHANT_SUB_ACCOUNTS_DESIGNATION').' as msad')
	$query->selectRaw('msad.id,msad.created_on,msad.designation,amst.uname,msad.updated_on,msad.status, (select count(*) from '.$this->config->get('tbl.MERCHANT_SUB_ACCOUNTS').' msa where msa.mrid = msad.mrid and msa.designation_id = msad.id) as staff_cunt');
	
	// CONCAT WITH SUM   Working
	
	$query->selectRAW('acm.signedup_on,acm.user_code,ad.firstname,cnty.country,cur.currency,(select concat_ws(" ",SUM(bill_amount),SUM(cv)) from '.$this->config->get('tables.PERSONAL_BONUS_MONTHLY_DETAILS').' where account_id = ap.account_id) as sales_qv')				      
				      ->orderBy('acm.signedup_on', 'DESC');
					  
					  // Used sub UQery not need group by and avoid join the table (PERSONAL_BONUS_MONTHLY_DETAILS) Bellow One 	
					  ->groupBy('ap.account_id')   
	
/* VALUES */  Localization (Ad)
if((isset($district_id) && !empty($district_id)) || $district_id=DB::table(config('tbl.LOCATION_DISTRICTS'))
			->where('district', $data['district'])
			->where('state_id', $data['state_id'])
			->value('district_id')){ 

/* WhereExists */ AdminCatalog (Ad)
if (DB::table(Config('tbl.BUSINESS_CATEGORY_TREE'))
            ->where('bcategory_id', $category_parent['bcategory_id'])
            ->exists())
		{
		
		}

DB::table('users')
	->whereExists(function ($query) {
		$query->select(DB::raw(1))
			  ->from('orders')
			  ->whereRaw('orders.user_id = users.id');
	})
	->get();
	
/* SELECT IF START  CP */
	->select('ft.ft_id','ft.transaction_id','ft.from_account_id','ft.from_account_wallet_id','ft.to_account_wallet_id','ft.transfered_on','ft.to_account_id','fum.uname as from_uname','tum.uname as to_uname','ft.amount','ft.paidamt','ft.status','ft.is_deleted','ft.currency_id','c.code as currency_code','c.currency_symbol',DB::Raw("CONCAT_WS('',fud.first_name,fud.last_name) as from_fullname"),DB::Raw("CONCAT_WS('',tud.first_name,tud.last_name) as to_fullname"),DB::Raw('if(ft.from_account_id>0,ft.from_account_id,ft.to_account_id ) as account'),
		  DB::Raw("if(ft.from_account_id>0,(select wallet from ".config('tblconstants.WALLET_LANG')." where wallet_id=ft.from_account_wallet_id and lang_id='".config('app.locale_id')."'),(select wallet from 
		  ".config('tblconstants.WALLET_LANG')." where wallet_id=ft.to_account_wallet_id and lang_id='".config('app.locale_id')."')) as wallet_name"))
/* SELECT IF END */

/* NEST */
    ->join($this->config->get('tables.CASHBACK_SETTINGS').' as scs', function($scs)
	{
		$scs->on('scs.supplier_id', '=', 'st.supplier_id')
		->nest(function($s)
		{
			$s->whereNull('scs.store_id')
			->orOn('scs.store_id', '=', 'msm.store_id');
		})
		->nest(function($c)
		{
			$c->where('scs.shop_and_earn', '=', $this->config->get('constants.ON'))
			->orWhere('scs.redeem', '=', $this->config->get('constants.ON'))
			->orWhere('scs.pay', '=', $this->config->get('constants.ON'));
		});
	})
	
/* SUBQUERY START CP */



/* (select wallet_name FROM '.config('tblconstants.WALLET').' where wallet_id=ub.wallet_id) as wallet_name
				
				select count(*) from '.config('tbl.MERCHANT_STORE_MST').' msm inner join '.config('tbl.MERCHANT_MST').' as mm on msm.mrid = mm.mrid where mm.created_by = am.account_id) as store_cnt
				
				'(select count(*) from '.config('tbl.MERCHANT_STORE_MST').' msm inner join '.config('tbl.MERCHANT_MST').' as mm on msm.mrid = mm.mrid where mm.created_by = am.account_id) as store_cnt')'
				
				'(select code FROM '.config('tblconstants.CURRENCIES').' where id=ub.currency_id) as currency_code' */


  $query->selectRAW('acm.signedup_on,acm.user_code,cnty.phonecode,ad.firstname,cnty.country,cur.currency,(select concat_ws(" ",SUM(bill_amount),SUM(cv)) from '.$this->config->get('tables.PERSONAL_BONUS_MONTHLY_DETAILS').' where account_id = ap.account_id) as sales_qv')

	  ->groupBy('ap.account_id')
	  
	  
    $query->where(function($sub)
	{
		$sub->where('status', config('constants.CATEGORY_STATUS.INACTIVE'))
			->orwhere('status', config('constants.CATEGORY_STATUS.DRAFT'));
	});

	 ->select(DB::Raw('am.account_id,am.signedup_on,am.uname,am.email,am.activated_on,am.status,am.block,am.block_login,ast.is_account_verified,concat_ws(" ",ad.first_name,ad.last_name) as fullname,concat_ws(" ",lcu.phonecode,am.mobile) as mobile,lcu.country,(select count(*) from '.config('tbl.MERCHANT_MST').' mm where mm.created_by = am.account_id) as merchat_cnt,(select count(*) from '.config('tbl.MERCHANT_STORE_MST').' msm inner join '.config('tbl.MERCHANT_MST').' as mm on msm.mrid = mm.mrid where mm.created_by = am.account_id) as store_cnt')) 
	->orderBy('am.signedup_on', 'DESC')  
	->get();   
	
	,(select count(*) from '.config('tbl.MERCHANT_MST').' mm where mm.created_by = am.account_id) as merchat_cnt,
	
	,(select count(*) from '.config('tbl.MERCHANT_STORE_MST').' msm inner join '.config('tbl.MERCHANT_MST').' as mm on msm.mrid = mm.mrid where mm.created_by = am.account_id) as store_cnt''
	
/* SUB QUERY START  END */	

/* Sub query */
$qry->select(DB::Raw('current_balance,tot_credit,tot_debit,currency_id,wallet_id,(select code FROM '.config('tblconstants.CURRENCIES').' where id=ub.currency_id) as currency_code,(select wallet_name FROM '.config('tblconstants.WALLET').' where wallet_id=ub.wallet_id) as wallet_name'));

  ->select('ut.account_id','um.signedup_on','um.uname','ud.mobile','ud.phonecode',DB::Raw("CONCAT_WS('',ud.first_name,ud.last_name) as full_name"),'um.email','um.status','ut.sponsor_id','usl.status_name','upum.uname as direct_uname','um.uname as direct_sponser_uname');		


public function upline_level($account_id){
	
		return DB::table(config('tblconstants.ACCOUNT_TREE').' as ut')
				 ->where('account_id','=',$account_id)
				 ->select('ut.level')
				 ->get();
	}
	$upline_level=$this->upline_level($account_id);
	$upline_level[0]->level;

	
/*  OUTTER JOIN */

SELECT a.* FROM bcategory_tree as a, (select a1.bcategory_id,b1.root_bcategory_id,b1.cat_lftnode,b1.cat_rgtnode from bcategory as a1 inner join bcategory_tree as b1 on a1.bcategory_id =b1.bcategory_id where a1.slug='fashion-apparel') as b where a.root_bcategory_id=b.root_bcategory_id and a.cat_lftnode > b.cat_lftnode and a.cat_rgtnode < b.cat_rgtnode



SELECT a.* FROM bcategory_tree as a inner join (select a1.bcategory_id,b1.root_bcategory_id,b1.cat_lftnode,b1.cat_rgtnode from bcategory as a1 inner join bcategory_tree as b1 on a1.bcategory_id =b1.bcategory_id where a1.slug='toys-games-toys-gift-store') as b on a.root_bcategory_id=b.root_bcategory_id and a.cat_lftnode > b.cat_lftnode and a.cat_rgtnode < b.cat_rgtnode order by a.cat_lftnode


*** OUTER JOIN  ***
SELECT a.* 
FROM   bcategory_tree AS a, 
       (SELECT a1.bcategory_id, 
               b1.root_bcategory_id, 
               b1.cat_lftnode, 
               b1.cat_rgtnode 
        FROM   bcategory AS a1 
               INNER JOIN bcategory_tree AS b1 
                       ON a1.bcategory_id = b1.bcategory_id 
        WHERE  a1.slug = 'fashion-apparel') AS b 
WHERE  a.root_bcategory_id = b.root_bcategory_id 
       AND a.cat_lftnode > b.cat_lftnode 
       AND a.cat_rgtnode < b.cat_rgtnode 



*** INNER JOIN ***

SELECT a.* 
FROM   bcategory_tree AS a 
       INNER JOIN (SELECT a1.bcategory_id, 
                          b1.root_bcategory_id, 
                          b1.cat_lftnode, 
                          b1.cat_rgtnode 
                   FROM   bcategory AS a1 
                          INNER JOIN bcategory_tree AS b1 
                                  ON a1.bcategory_id = b1.bcategory_id 
                   WHERE  a1.slug = 'toys-games-toys-gift-store') AS b 
               ON a.root_bcategory_id = b.root_bcategory_id 
                  AND a.cat_lftnode > b.cat_lftnode 
                  AND a.cat_rgtnode < b.cat_rgtnode 
ORDER  BY a.cat_lftnode 



*** BINDING ***

SELECT `mm`.`mrid`, 
       `mm`.`bcategory_id`, 
       `msm`.`store_name`, 
       `mm`.`mrbusiness_name`, 
       `msm`.`store_code`, 
       `msm`.`store_logo` AS `logo`, 
       `mm`.`mrlogo`, 
       `msm`.`store_id` 
FROM   `merchant_store_mst` AS `msm` 
       LEFT JOIN `merchant_mst` AS `mm` 
              ON `mm`.`mrid` = `msm`.`mrid` 
       LEFT JOIN `merchant_settings` AS `ms` 
              ON `ms`.`mrid` = `msm`.`mrid` 
       LEFT JOIN `address_mst` AS `am` 
              ON `am`.`address_id` = `msm`.`address_id` 
                 AND `am`.`post_type` = 3 
       INNER JOIN `bcategory_tree` AS `c` 
               ON `c`.`bcategory_id` = `msm`.`bcategory_id` 
       INNER JOIN (SELECT sct.bcategory_id, 
                          sct.root_bcategory_id, 
                          sct.cat_lftnode, 
                          sct.cat_rgtnode 
                   FROM   `bcategory` AS `sc` 
                          INNER JOIN `bcategory_tree` AS `sct` 
                                  ON `sct`.`bcategory_id` = `sc`.`bcategory_id` 
                   WHERE  `sc`.`slug` = 'fashion-apparel') AS p 
               ON `c`.`root_bcategory_id` = `p`.`root_bcategory_id` 
ORDER  BY `store_name` ASC 

/*   CASE   */

$franchisee_type_arr = (array(
            1=>'LOCATION_COUNTRY',
            2=>'LOCATION_REGIONS',
            3=>'LOCATION_STATE',
            4=>'LOCATION_DISTRICTS',
            5=>'LOCATION_CITY'));
        $franchisee_field_arr = (array(
            1=>'name',
            2=>'region_name',
            3=>'name',
            4=>'district_name',
            5=>'city_name'));
        $franchisee_wfield_arr = (array(
            1=>'country_id',
            2=>'region_id',
            3=>'state_id',
            4=>'district_id',
            5=>'city_id'));
        $users = $from = $to = $user_name = $ustatus = '';		
        $users = DB::table($this->config->get('tables.ACCOUNT_MST').' as um')
                ->join($this->config->get('tables.ACCOUNT_DETAILS').' as ud', 'ud.account_id', '=', 'um.account_id', 'left')
				->join($this->config->get('tables.ACCOUNT_PREFERENCE').' as up', 'up.account_id', '=', 'um.account_id', 'left')
                ->join($this->config->get('tables.CURRENCIES').' as c', 'c.currency_id', '=', 'up.currency_id', 'left')
                ->join($this->config->get('tables.LOCATION_COUNTRY').' as lc', 'lc.country_id', '=', 'up.country_id', 'left')
                ->join($this->config->get('tables.FRANCHISEE_MST').' as fs', 'fs.account_id', '=', 'um.account_id')
                ->join($this->config->get('tables.FRANCHISEE_ACCESS_LOCATION').' as fal', 'fal.account_id', '=', 'um.account_id')
                ->join($this->config->get('tables.FRANCHISEE_LOOKUP').' as fl', 'fl.franchisee_typeid', '=', 'fs.franchisee_type')
                ->where('um.account_type_id', $this->config->get('constants.ACCOUNT_TYPE.FRANCHISEE'))
                ->select(DB::raw("um.*, ud.*,concat_ws(' ',ud.firstname,ud.lastname) as full_name, um.account_id, um.status as ustatus,c.currency,fs.franchisee_type,fl.franchisee_type as franchisee_type_name,up.country_id,lc.country,lc.phonecode,um.status as user_status,fs.company_name,fs.company_address, fs.office_available,fs.is_deposited,fs.deposited_amount, fal.relation_id,
				(CASE WHEN (fal.access_location_type = '1')
				THEN (select country from  ".$this->config->get('tables.LOCATION_COUNTRY')." where country_id =  fal.relation_id) ELSE	'' END) as access_country_name,
				(CASE WHEN (fal.access_location_type = '2')
				THEN (select region from  ".$this->config->get('tables.LOCATION_REGIONS')." where region_id =  fal.relation_id) ELSE	'' END) as access_region_name,
				(CASE WHEN (fal.access_location_type = '3')
				THEN (select state from  ".$this->config->get('tables.LOCATION_STATE')." where state_id =  fal.relation_id) ELSE	'' END) as access_state_name,
				(CASE WHEN (fal.access_location_type = '4')
				THEN (select district from  ".$this->config->get('tables.LOCATION_DISTRICTS')." where district_id =  fal.relation_id) ELSE	'' END) as access_district_name,
				 (CASE WHEN (fal.access_location_type = '5')
				THEN (select city from  ".$this->config->get('tables.LOCATION_CITY')." where city_id =  fal.relation_id) ELSE '' END) as access_city_name,
				(CASE WHEN (fs.franchisee_type = '2')
				THEN (select cum.uname from  ".$this->config->get('tables.FRANCHISEE_ACCESS_LOCATION')." cfal
				inner join ".$this->config->get('tables.ACCOUNT_MST')." cum  on cum.account_id = cfal.account_id  where cfal.	access_location_type = '1' and cfal.relation_id IN(select country_id from location_regions where region_id = fal.relation_id) LIMIT 1) ELSE	'' END) as country_frname,
				(CASE WHEN (fs.franchisee_type = '3')
				THEN (select cum.uname from  ".$this->config->get('tables.FRANCHISEE_ACCESS_LOCATION')." cfal
				inner join ".$this->config->get('tables.ACCOUNT_MST')." cum  on cum.account_id = cfal.account_id  where cfal.	access_location_type = '1' and cfal.relation_id IN(select country_id from ".$this->config->get('tables.LOCATION_STATE')." where state_id = fal.relation_id) LIMIT 1) ELSE	'' END) as country_frname1,
				(CASE WHEN (fs.franchisee_type = '3')
				THEN (select cum.uname from  ".$this->config->get('tables.FRANCHISEE_ACCESS_LOCATION')." cfal
				inner join ".$this->config->get('tables.ACCOUNT_MST')." cum  on cum.account_id = cfal.account_id  where cfal.access_location_type = '2' and cfal.relation_id IN(select region_id from ".$this->config->get('tables.LOCATION_STATE')." where state_id = fal.relation_id) LIMIT 1) ELSE	'' END) as region_frname,
				(CASE WHEN (fs.franchisee_type = '4')
				THEN (select cum.uname from  ".$this->config->get('tables.FRANCHISEE_ACCESS_LOCATION')." cfal
				inner join ".$this->config->get('tables.ACCOUNT_MST')." cum  on cum.account_id = cfal.account_id  where cfal.access_location_type = '3' and cfal.relation_id IN(select state_id from location_districts where district_id = fal.relation_id) LIMIT 1) ELSE	'' END) as state_frname,
				(CASE WHEN (fs.franchisee_type = '4')
				THEN (select cum.uname from  ".$this->config->get('tables.FRANCHISEE_ACCESS_LOCATION')." cfal
				inner join ".$this->config->get('tables.ACCOUNT_MST')." cum  on cum.account_id = cfal.account_id  where cfal.access_location_type = '2' and cfal.relation_id IN(select region_id from ".$this->config->get('tables.LOCATION_STATE')." where state_id = (select state_id from location_districts where district_id = fal.relation_id)) LIMIT 1) ELSE	'' END) as region_frname1,
				(CASE WHEN (fs.franchisee_type = '4')
				THEN (select cum.uname from  ".$this->config->get('tables.FRANCHISEE_ACCESS_LOCATION')." cfal
				inner join ".$this->config->get('tables.ACCOUNT_MST')." cum  on cum.account_id = cfal.account_id  where cfal.access_location_type = '1' and cfal.relation_id IN(select country_id from ".$this->config->get('tables.LOCATION_STATE')." where state_id = (select state_id from location_districts where district_id = fal.relation_id)) LIMIT 1) ELSE	'' END) as country_frname2,
				(CASE WHEN (fs.franchisee_type = '5')
				THEN (select cum.uname from  ".$this->config->get('tables.FRANCHISEE_ACCESS_LOCATION')." cfal
				inner join ".$this->config->get('tables.ACCOUNT_MST')." cum  on cum.account_id = cfal.account_id  where cfal.access_location_type = '4' and cfal.relation_id IN(select district_id from ".$this->config->get('tables.LOCATION_STATE')." where state_id = fal.relation_id) LIMIT 1) ELSE	'' END) as district_frname,
				(CASE WHEN (fs.franchisee_type = '5')
				THEN (select cum.uname from  ".$this->config->get('tables.FRANCHISEE_ACCESS_LOCATION')." cfal
				inner join ".$this->config->get('tables.ACCOUNT_MST')." cum  on cum.account_id = cfal.account_id  where cfal.access_location_type = '3' and cfal.relation_id IN(select state_id from location_city where city_id = fal.relation_id) LIMIT 1) ELSE	'' END) as state_frname1,
				(CASE WHEN (fs.franchisee_type = '5')
				THEN (select cum.uname from  ".$this->config->get('tables.FRANCHISEE_ACCESS_LOCATION')." cfal
				inner join ".$this->config->get('tables.ACCOUNT_MST')." cum  on cum.account_id = cfal.account_id  where cfal.access_location_type = '2' and cfal.relation_id IN(select region_id from location_states where state_id = (select state_id from location_city where city_id = fal.relation_id)) LIMIT 1) ELSE	'' END) as region_frname2,
				(CASE WHEN (fs.franchisee_type = '5')
				THEN (select cum.uname from  ".$this->config->get('tables.FRANCHISEE_ACCESS_LOCATION')." cfal
				inner join ".$this->config->get('tables.ACCOUNT_MST')." cum  on cum.account_id = cfal.account_id  where cfal.access_location_type = '1' and cfal.relation_id IN(select country_id from location_states where state_id = (select state_id from location_city where city_id = fal.relation_id)) LIMIT 1) ELSE	'' END) as country_frname3
				"));

/* SOMETHING */
CREATE DEFINER=`root`@`localhost` FUNCTION `calculate_distance`(`ilat` DOUBLE, `ilng` DOUBLE, `clat` DOUBLE, `clng` DOUBLE) RETURNS double
    NO SQL
BEGIN
 
return 3956  2  ASIN(SQRT( POWER(SIN((ilat - clat)   pi()/180 / 2), 2) +COS(ilat  pi()/180)  COS(clat  pi()/180)  POWER(SIN((ilng -clng)  pi()/180 / 2), 2) ));
END


/* KEYWORDS */
cannot add foreign key constraint phpmyadmin while importing


?>
https://stackoverflow.com/questions/38321305/cannot-add-foreign-key-constraint-in-phpmyadmin?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa   BIG PROBLEM
https://www.percona.com/blog/2013/09/20/innodb-performance-optimization-basics-updated/

