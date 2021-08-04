
Nested set  Numbering Agesency model hierarical model value  ajiel methology, watterfall methology model tree model
hierarical Methodology , Linage Metodology
<?php
	
	//print_r($this->request->all());exit; //request()->all()
	//print_r($request->all());exit; //request()->all()
	//print_r($request->account_id);exit; //request()->all()  

	/* Currency Format */
	
	$t->Fpaidamt = \CommonLib::currency_format($t->paid_amt, ['currency_symbol'=>$t->currency_symbol, 'currency_code'=>$t->currency_code, 'value_type'=>(''), 'decimal_places'=>$t->decimal_places]);
	
	$balInfos->current_balance =$balInfos->currency_symbol .' '.number_format($balInfos->current_balance, \AppService::decimal_places($balInfos->current_balance), '.', ',').' '.$balInfos->currency_code;
	
/* Date */

if (isset($from) && isset($to) && !empty($from) && !empty($to))
{
	$query->whereDate('redin.created_date', '>=', getGTZ($from, 'd-M-Y'));
	$query->whereDate('redin.created_date', '<=', getGTZ($to, 'd-M-Y'));
}
if ((!isset($from) || empty($to)) && isset($from) && !empty($from))
{
	$query->whereDate('redin.created_date', '<=', getGTZ($from, 'd-M-Y'));
}
if ((!isset($from) || empty($from)) && isset($to) && !empty($to))
{
	$query->whereDate('redin.created_date', '>=', getGTZ($to, 'd-M-Y'));
}

if (isset($from) && isset($to) && !empty($from) && !empty($to))
{
	$query->whereRaw("DATE(um.signedup_on) >='".getGTZ($from, 'd-M-Y')."'");
	$query->whereRaw("DATE(um.signedup_on) <='".date('Y-m-d', strtotime($to))."'");
}
else if (!empty($from) && isset($from))
{
	$query->whereRaw("DATE(um.signedup_on) <='".date('Y-m-d', strtotime($from))."'");
}
else if (!empty($to) && isset($to))
{
	$query->whereRaw("DATE(um.signedup_on) >='".date('Y-m-d', strtotime($to))."'");
}

/* Print_ Export */

<div class="form-group">
	<button type="button" id="searchbtn" class="btn btn-sm bg-olive"><i class="fa fa-search"></i> {{trans('general.btn.search')}}</button>&nbsp;                            
	<button type="submit" name="export_btn" id="export_btn" class="btn btn-primary btn-sm exportBtns" value="Export"><i class="fa fa-file-excel-o"></i> {{trans('general.btn.export')}}</button>&nbsp;
	<button type="submit" name="print_btn" id="print_btn" class="btn btn-info btn-sm exportBtns" value="Print"><i class="fa fa-print"></i> {{trans('general.btn.print')}}</button>&nbsp;&nbsp;
	<button type="button" id="resetbtn" class="btn btn-sm bg-orange"><i class="fa fa-repeat"></i> {{trans('general.btn.reset')}}</button>&nbsp;
</div>

//Email

$mdata = array(
		'full_name'=>$this->userSess->full_name,
		'uname'=>$this->userSess->uname,
	
		'last_activity'=>date('Y-m-d H:i:s'),
		'client_ip'=>$this->request->ip(true));
		$email_data = array('email'=>$this->userSess->email);
	CommonNotifSettings::affNotify('affiliate.account.settings.change_password_resetnotify', $this->userSess->account_id, 0, $mdata,true,false);
	/* $htmls = view('emails.affiliate.account.settings.change_password', $data)->render(); 		
	$mstatus = TWMailer::send(array(
			 'to'=>$email_data['email'], 
			 'subject'=>'Your Password has been changed',
			 'view'=> $htmls,
			 'data'=>$data,
			 'from'=>$this->pagesettings->noreplay_emailid,
			 'fromname'=>$this->pagesettings->site_domain), $this->pagesettings
		   );  */
		   

// Validation

    if(isset($postdata['tran_newpassword']))
    { 	
		$rules =[
			 'tran_oldpassword'=>'required|regex:/([a-zA-Z0-9]+)/|min:4|max:20',
			 'tran_newpassword' => 'required|regex:/([a-zA-Z0-9]+)/|min:4|max:20',
			 'tran_confirmpassword'=> 'required|regex:/([a-zA-Z0-9]+)/|min:4|max:20',//|same:tran_newpassword',
		];
		$messages =[
			 'tran_oldpassword.regex' => trans('affiliate/validator/change_email_js.old_password'), 
			 'tran_oldpassword.min' => trans('affiliate/validator/change_email_js.min_length') ,
			 'tran_oldpassword.max' => trans('affiliate/validator/change_email_js.max_length') ,
			 'tran_newpassword.regex' => trans('affiliate/validator/change_email_js.new_password'), 
			 'tran_newpassword.min' => trans('affiliate/validator/change_email_js.min_length') ,
			 'tran_newpassword.max' => trans('affiliate/validator/change_email_js.max_length') ,
			 'tran_confirmpassword.same'=>trans('affiliate/validator/change_email_js.confirm_password') ,
		];
		$validator = Validator::make($postdata,$rules,$messages);
		if ($validator->fails())
		{	
			$ers = $validator->errors();
			foreach($rules  as $key=>$formats){
				$op['errs'][$key] =  $validator->errors()->first($key);			
			}
			$this->statusCode = $this->config->get('httperr.UN_PROCESSABLE');
			return $this->response->json($op, $this->statusCode, $this->headers, $this->options);
		}
		$checkType = 1;
	}


//Controller
public function getTranshistory ()
{  
	$postdata = $this->request->all();	
	$op['recordsFiltered'] = 0;
	$op['data'] = $filter = [];
	$op['draw'] = $this->request->draw;
	$wdata['account_id'] = $this->userSess->account_id;
	$wdata['mrid'] = $this->userSess->mrid;
	$wdata['role_id'] = $this->userSess->system_role_id;
	$wdata['store_id'] = $this->userSess->store_id;
	if (!empty($postdata))
	{
		$filter['trans_type'] = isset($postdata['trans_type']) ? $postdata['trans_type'] : null;
		$filter['from'] = !empty($postdata['from']) ? $postdata['from'] : '';
		$filter['to'] = !empty($postdata['to']) ? $postdata['to'] : '';
		$filter['search_term'] = !empty($postdata['search_term']) ? trim($postdata['search_term']) : '';
		$filter['currency_id'] = !empty($postdata['currency_id']) ? $postdata['currency_id'] : '';
		$filter['wallet'] = !empty($postdata['wallet']) ? $postdata['wallet'] : '';
		$filter['currency'] = !empty($postdata['currency']) ? $postdata['currency'] : '';
		$filter['export_btn'] = isset($postdata['export_btn']) && !empty($postdata['export_btn'])? $postdata['export_btn'] : '';
		$filter['print_btn'] = isset($postdata['print_btn']) && !empty($postdata['print_btn'])? $postdata['print_btn'] : '';
		$submit = isset($postdata['submit']) ? $postdata['submit'] : '';
		if(!is_null($filter['trans_type'])&&($filter['trans_type'] == 2)){
			unset($filter['trans_type']);
		}
	}
	$wdata = array_merge($wdata, $filter);			
	if ($this->request->ajax())			
	{	
		$op['recordsTotal'] = $this->walletObj->transactions($wdata, true);
		if (!empty($op['recordsTotal']) && $op['recordsTotal'] > 0)
		{
			$op['recordsFiltered'] = $op['recordsTotal'];  //if no records in data in tables 0 records//
			if ($this->request->is('api/v1/*'))
			{
				$wdata['start'] = !empty($postdata['page']) ? ($postdata['page'] - 1) : 0;
				$wdata['length'] = !empty($postdata['length']) ? $postdata['length'] : 10;
				$op['length'] = $wdata['length'];
				$op['cpage'] = ($wdata['start'] + 1);
				$op['move_next'] = (($wdata['start'] + 1) < ceil($op['recordsFiltered'] / $wdata['length'])) ? true : false;
			}
			else
			{
				$wdata['start'] = (isset($postdata['start']) && !empty($postdata['start'])) ? $postdata['start'] : 0;
				$wdata['length'] = (isset($postdata['length']) && !empty($postdata['length'])) ? $postdata['length'] : 10;
			}
			if (isset($postdata['order']))
			{
				$wdata['orderby'] = $postdata['columns'][$postdata['order'][0]['column']]['name'];
				$wdata['order'] = $postdata['order'][0]['dir'];
			}
			$op['data'] = $this->walletObj->transactions($wdata);
			if ($wdata['start'] == 0)
			{
				$op['filters']['wallets'] = $this->walletObj->get_wallets();
				//$op['filters']['currencies'] = $this->commonObj->getCurrenciesByID();
				$op['filters']['currencies'] = $this->walletObj->MyCurrencies($wdata);
			}
		}
		return $this->response->json($op, $this->config->get('httperr.SUCCESS'), $this->header, $this->options);
	}
	else if (isset($filter['export_btn']) && $filter['export_btn'] == 'Export')
	{  
		$coulumns = [
			['title'=>trans('general.label.created_on'), 'name'=>'created_on', 'format'=>'long-date', 'align'=>'center'],
			['title'=>trans('general.label.transaction_id'), 'name'=>'transaction_id','align'=>'center'],
			['title'=>trans('general.retailer.wallet.description'), 'name'=>'remark','align'=>'left'],
			['title'=>trans('general.label.status'), 'name'=>'status','align'=>'center'],
			['title'=>trans('general.retailer.wallet.amount'), 'name'=>'amount','align'=>'right'],            
		];			
		$exp = CommonLib::export(trans('general.retailer.wallet.wallet_hist'), $coulumns, $this->walletObj->transactions($wdata));
		return $this->response->make($exp->body, 200, $exp->headers);
	}
	else if (isset($filter['print_btn']) && $filter['print_btn'] == 'Print')
	{   
		$ajaxdata['title'] = trans('general.retailer.wallet.wallet_hist');
		$ajaxdata['columns'] = [
			['title'=>trans('general.label.created_on'), 'name'=>'created_on', 'format'=>'long-date', 'align'=>'center'],
			['title'=>trans('general.label.transaction_id'), 'name'=>'transaction_id','align'=>'center'],
			['title'=>trans('general.retailer.wallet.description'), 'name'=>'remark','align'=>'left'],
			['title'=>trans('general.label.status'), 'name'=>'status','align'=>'center'],
			['title'=>trans('general.retailer.wallet.amount'), 'name'=>'amount','align'=>'right'], 
		];
		$ajaxdata['data'] = $this->walletObj->transactions($wdata);
		return view('print-layout', $ajaxdata);
	}		
	return $this->response->json($op, $this->config->get('httperr.SUCCESS'), $this->header, $this->options);
}

/* RATINGS */

private function updateRatings ($post_type, $post_id, $rating, $pre_rating = null)
{
	if (DB::table($this->config->get('tbl.RATINGS'))
					->where('post_type', $post_type)
					->where('post_id', $post_id)
					->count())
	{
		$r = [];
		$r['rating_'.$rating] = DB::raw('rating_'.$rating.'+1');
		$r['updated_on'] = getGTZ();
		if (!is_null($pre_rating))
		{
			$r['rating_'.$pre_rating] = DB::raw('rating_'.$pre_rating.'-1');
			$r['tot_rating'] = DB::raw('tot_rating-'.$pre_rating.'+'.$rating);
		}
		else
		{
			$r['rating_count'] = DB::raw('rating_count+1');
			$r['tot_rating'] = DB::raw('tot_rating+'.$rating);
		}
		if (DB::table($this->config->get('tbl.RATINGS'))
						->where('post_type', $post_type)
						->where('post_id', $post_id)
						->update($r))
		{
			return DB::table($this->config->get('tbl.RATINGS'))
							->where('post_type', $post_type)
							->where('post_id', $post_id)
							->update(array(
								'rating'=>DB::raw('(tot_rating/rating_count)'),
			));
		}
	}
	else
	{
		return DB::table($this->config->get('tbl.RATINGS'))
						->insertGetId(array(
							'post_type'=>$post_type,
							'post_id'=>$post_id,
							'rating_'.$rating=>1,
							'tot_rating'=>$rating,
							'rating_count'=>1,
							'rating'=>$rating,
							'updated_on'=>getGTZ()));
	}
}

/* String  Padding */

/* Error Log */
  default :
	Log::error('Transaction Details Not Configured for Statementline ID: '.$trans->statementline_id);
	return abort(500, 'Transaction Details Not Configured for Statementline ID: '.$trans->statementline_id);

/* Hide Mobile number */

public function hideMobileNumber ($mobile, $length = 4)
    {
        return str_repeat('*', strlen($mobile) - $length).substr($mobile, -1 * $length);
    }

/*  Hide Email Address */

$email2 = preg_replace('/(?<=.).(?=.*@)/', '*', $email);
$email3 = preg_replace('/(?<=@.)[a-zA-Z0-9-]*(?=(?:[.]|$))/', '*', $email2);

 OR
 function obfuscate_email($email)
{
    $em   = explode("@",$email);
    $name = implode(array_slice($em, 0, count($em)-1), '@');
    $len  = floor(strlen($name)/2);

    return substr($name,0, $len) . str_repeat('*', $len) . "@" . end($em);   
}

// to see in action:
$emails = ['"Abc\@def"@iana.org', 'abcdlkjlkjk@hotmail.com'];

foreach ($emails as $email) 
{
    echo obfuscate_email($email) . "\n";
}
echoes:

"Abc\*****@iana.org"
abcdl*****@hotmail.com
uses substr() and str_repeat()

/* COOKIES */
use DB;
use Illuminate\Support\Facades\Cookie; 
use CommonLib;
use File;
use QRcode;

OR
\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
-----

Cookie::queue(
        'refresh_token',
        $data->refresh_token,
        864000, // 10 days
        null,
        null,
        false,
        true // HttpOnly
    );
	
	
/* OWN Functions */
number_format($deal->offer, 0).' %';
$result->discount = floatval($result->discount); 12.00 out 12  12.1 out 12.1

/* TRIM & SUBSTR */
    $stores = substr($stores, 0, -1);
	$stores = rtrim($stores,',');

/* Check Root */
if (!$this->request->is('api/v1/*'))
{
	$op['status'] = $this->statusCode = $this->config->get('httperr.TEMPORARY_REDIRECT');
	$op['url'] = route('user.my-deals.details', ['receipt_code'=>$op['deal']->receipt_code]);
}
/* REGEXP */
$search_term = str_replace(' ', '|', $search_term);
$s->where('msm.store_name', 'REGEXP', $search_term);
   
/* API/V1  */
    if ($this->request->is('api/v1/*'))
	{
		return $this->response->json($res, $this->statusCode, $this->header, $this->options);
	}
     
/* RAND */
   $pgr['payment_id'] = rand(100,999).$pgr['id'];
   
    public function generateRefferalCode ()
    {
        return strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 6));
        //return rand(100000, 999999);
        $length = 5;
        $type = $this->config->get('constants.REFCODE_CHARSET.'.$this->siteConfig->refcode_charset);
        //$usrRecCnt = DB::table($this->config->get('tbl.ACCOUNT_SETTINGS'))->selectRaw('MAX(LENGTH(referral_code)) as ref_lenexist'),DB::Raw('MAX(account_id) as idLength')->first();
        $usrRecCnt = (object) ['ref_lenexist'=>9, 'idLength'=>124585];
        echo '<pre>';
        if (!empty($usrRecCnt))
        {
            $preLength = str_pad(1, $length, 0);
            echo $preLength.'<br>';
            echo $usrRecCnt->idLength.'<br>';
            if ($preLength < $usrRecCnt->idLength)
            {
                echo strlen($usrRecCnt->ref_lenexist).'<br>';
                $preLength = str_pad(1, strlen($usrRecCnt->ref_lenexist) + 1, 0);
                echo $preLength.'<pre>';
            }
            exit;
            return $usrRecCnt;
        }
        return NULL;
    }
   
    function random_code($limit)
	{
		return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
	}
	 
	echo random_code(8);
	
	function generate_code($length) 
	{  
		$data[] = array(1,2,3,4,5,6,7,8,9,0,'a','b','c','d','e','f');    
		$res = '';     
		for ($i=0;$i<$length;$i++)     {    
		$res .= $data[rand(0,count($data))];    
		}    
		return $res;
	}
   
/* REDIRECT  ASSIGN  */
public function logout ()
{
	$this->session->forget($this->sessionName);
	return redirect()->route('user.home');
}


/* Mine do while */
    $parents = array();
	$parents[] = $res->bcategory_id;
	//print_r($parents);exit;
	foreach($parents as $parent){
		if(DB::table($this->config->get('tbl.BUSINESS_CATEGORY_TREE'))
				->where('bcategory_id', $parent)
				->whereNotNull('parent_bcategory_id')
				->exists())
		{
			$res =DB::table($this->config->get('tbl.BUSINESS_CATEGORY_TREE').' as bct')
				->where('bct.bcategory_id', $parent)
				->value('bct.parent_bcategory_id');
		}
		array_push($parents,$res);
	}
	*****
	$parents = array();
		$parents[] = $bcategory_id = $res->bcategory_id;
		//print_r($parents);exit;
		do{
			$parents[] = $bcategory_id = DB::table($this->config->get('tbl.BUSINESS_CATEGORY_TREE'))
					->where('bcategory_id', $bcategory_id)
					->value('parent_bcategory_id');
		}
		while(!is_null($bcategory_id));		
		print_r($parents);exit;	
    *****
	$res->parents = array();
            $bcategory_id = $res->bcategory_id;
			do{
				$res->parents[] = $bcategory_id;
				$bcategory_id = DB::table($this->config->get('tbl.BUSINESS_CATEGORY_TREE'))
				        ->where('bcategory_id', $bcategory_id)
		                ->value('parent_bcategory_id');
			}
			while(!is_null($bcategory_id));
			$res->parents=array_reverse($res->parents);
			
			DATE
			(!is_null($affiliate->created_on) || $affiliate->created_on=='0000-00-00 00:00:00' )
			(!is_null($result->expired_on) && ($result->expired_on != '0000-00-00 00:00:00')) ? showUTZ($result->expired_on, 'd-M-Y') : trans('general.never_expire');
/* TM Mailer */

print_r(view($view, $data)->render());
				exit;

/* TRANS */

   'updated'=>':which :what Successfully...',
   trans('general.updated', ['which'=>'Deal', 'what'=>trans('general.deleted')]);

/* SLUG CHECKING */
public function slug ($text)
{  
	$text = preg_replace('/\W|_/', '-', $text);
	$text = preg_replace('/-+/', '-', trim($text, '-')); 
	$text = strtolower($text);
	if (empty($text))
	{
		return false;
	}
	return $text;
}

/* SEGMENTS */
  
    EX URL   http://localhost:8888/projects/oop/2  {{Request::segment(1)}} Output- projects 

    $data = $op = [];
	$type = $this->request->segments();
	$type = end($type);
	
	{{Request::segment(1)}}   AND  $this->request->segments(1)
	
	
    dd(Request::segments());
	$data['page_name']=$this->request->segment(1);
	
	url()->current();
	Request::url();
	$this->request->url();
	$this->request->fullUrl();
    $this->request->path();
    $this->request->root();

	Error:
	   NotFoundHttpException in Application.php line 902:  
	   Solved Change Route Method

/* EACH */
if ($res)
{
	foreach($res as $key => $val) {
		$sdata[$key] = isset($postdata['security'][$key]) ? $val : config('constants.OFF');
	} 
}

public function widgets () 
{
	$post = $this->request->all();
	if(isset($post['widgets']) && is_array($post['widgets']) && count($post['widgets'])>0){
		foreach($post['widgets'] as $widget){
			$op[$widget] = $this->$widget();
		}
		return $this->response->json($op, $this->statusCode, $this->header, $this->options);
	}
}

/* ARRAY_KEY_EXISTS */
 if (array_key_exists($status, config('constants.MERCHANT.STORE.IS_APPROVED')))
	{
	}
	
/* Validation */
'required|between:0,99.99'   //decimal values
	
/* Filters  */ allow 0 or any values in filters
    $filter = array_filter($filter,function($field){
		return !($field=="");
	});

/* DB:TRANSACTION & COMMIT AND ROLLBACK  */
    public function saveDealsItems (array $arr = array())
    {
        extract($arr);
        DB::begintransaction();
        DB::table($this->config->get('tbl.DEAL_GROUP_ITEMS'))
                ->where('group_id', $id)
                ->whereNotIn('deal_id', $deals)
                ->where('is_deleted', $this->config->get('constants.OFF'))
                ->update([
                    'is_deleted'=>$this->config->get('constants.ON'),
                    'updated_on'=>date('Y-m-d H:i:s'),
                    'updated_by'=>$account_id
        ]);
        foreach ($deals as $deal)
        {
            if (DB::table($this->config->get('tbl.DEAL_GROUP_ITEMS'))
                            ->where('group_id', $id)
                            ->where('deal_id', $deal)
                            ->exists())
            {
                DB::table($this->config->get('tbl.DEAL_GROUP_ITEMS'))
                        ->where('group_id', $id)
                        ->where('deal_id', $deal)
                        ->where('is_deleted', $this->config->get('constants.ON'))
                        ->update([
                            'is_deleted'=>$this->config->get('constants.OFF'),
                            'updated_on'=>date('Y-m-d H:i:s'),
                            'updated_by'=>$account_id
                ]);
            }
            else
            {
                DB::table($this->config->get('tbl.DEAL_GROUP_ITEMS'))
                        ->insert([
                            'group_id'=>$id,
                            'deal_id'=>$deal,
                            'created_on'=>date('Y-m-d H:i:s'),
                            'updated_by'=>$account_id
                ]);
            }
        }
        if (DB::table($this->config->get('tbl.DEAL_GROUP_ITEMS'))
                        ->where('group_id', $id)
                        ->where('is_deleted', $this->config->get('constants.OFF'))
                        ->count() == count($deals))
        {
            DB::commit();
            return true;
        }
        DB::rollback();
        return false;
    }
	
/* ADDBINDING & GETBINDING */

    if (isset($category) && !empty($category))
	{
		$parent = DB::table($this->config->get('tbl.BUSINESS_CATEGORY_TREE').' as sct')
				->whereIn('sct.bcategory_id', $category)
				->selectRaw('sct.bcategory_id,sct.root_bcategory_id,sct.cat_lftnode,sct.cat_rgtnode');
		$items->join($this->config->get('tbl.BUSINESS_CATEGORY').' as bcc', function($bcc)
				{
					$bcc->on('bcc.bcategory_id', '=', 'd.bcategory_id')
					->where('bcc.status', '=', $this->config->get('constants.ACTIVE'))
					->where('bcc.is_deleted', '=', $this->config->get('constants.OFF'));
				})
				->join($this->config->get('tbl.BUSINESS_CATEGORY_TREE').' as ct', 'ct.bcategory_id', '=', 'd.bcategory_id')
				->join(DB::raw('('.$parent->tosql().') as p'), function($p)
				{
					$p->on('ct.root_bcategory_id', '=', 'p.root_bcategory_id')
					->on('ct.cat_lftnode', '>=', 'p.cat_lftnode')
					->on('ct.cat_rgtnode', '<=', 'p.cat_rgtnode');
				})
				->addBinding($parent->getBindings(), 'join');
	}
	
	/* increment decrement */
	
    DB::table($this->config->get('tbl.DEAL_SALES'))
				   ->where('pb_deal_id', $id)
				   ->increment('sold', 1, ['updated_on'=>getGTZ()]);

    DB::table($this->config->get('tbl.DEAL_SALES'))
			->where('pb_deal_id', $deal->pb_deal_id)
			->decrement('sold', 1, ['updated_on'=>getGTZ()]);
	$status = 1;	

/* SAVE IMG IN DIRECTORY CONTROLLER */

	public function saveDealGroup ($id = null)
    {   
        $op = [];
        $data = $this->request->all(); 
        $data['id'] = $id;
        $data['account_id'] = $this->userSess->account_id;
        if (isset($data['group']['img']) && !empty($data['group']['img']))
        {
            $logo = $data['group']['img'];
            $folder_path = date('Y').'/'.date('m').'/';
            $path = $this->config->get('constants.OFFERS_GROUP.IMG_PATH.LOCAL');
            if (File::exists($path.date('Y')))
            {
                if (!File::exists($path.date('Y').'/'.date('m')))
                {
                    File::makeDirectory($path.date('Y').'/'.date('m'));
                }
            }
            else
            {
                File::makeDirectory($path.date('Y'));
                File::makeDirectory($path.date('Y').'/'.date('m'));
            }
            $org_name = $logo->getClientOriginalName();
            $ext = $logo->getMimeType();
            $mine_type = array('image/jpeg'=>'jpg', 'image/jpg'=>'jpg', 'image/png'=>'png', 'image/gif'=>'gif');
            $ext = $mine_type[$ext];
            $file_name = explode('_', $this->slug($org_name));
            $file_name = $file_name[0];
            $file_name = $file_name.'.'.$ext;
            $filename = date('dmYHis').$file_name;
            if ($logo->move($path.$folder_path, $filename))
            {
                $data['group']['img'] = $folder_path.$filename;
            }
        }
        else
        {
            unset($data['group']['img']);
        }
        if ($this->retailerObj->saveDealGroup($data, $id))
        {
            $op['status'] = $this->statusCode = $this->config->get('httperr.SUCCESS');
            $op['msg'] = trans('general.updated', ['which'=>trans('general.stores.deals.group.deals_group'), 'what'=>trans('general.actions.updated')]);
        }
        else
        {
            $op['status'] = $this->statusCode = $this->config->get('httperr.UN_PROCESSABLE');
            $op['msg'] = trans('general.already', ['which'=>trans('general.stores.deals.group.deals_group'), 'what'=>trans('general.actions.updated')]);
        }
        return $this->response->json($op, $this->statusCode, $this->header, $this->options);
    }
	
/* Having  && Group */	
 if(DB::table($this->config->get('tbl.NOTIF_EMAIL_SETTINGS'))
                ->where('is_deleted', config('constants.OFF'))
				->where('mrid', $mrid)
				->having(DB::raw('count(mrid)'),'<',10)
				//->groupby('mrid')
                ->exists())
	{
		Something...
	}	
	
/* Extra Querys  WHERE FIND_IN_SET */

    $country_ids =[77,104];
    ->whereRaw('countries REGEXP "[[:<:]]('.implode('|', $country_ids).')[[:>:]]"');
       OR
	$colname = 'css'
	$query = DB::table('tags_value')
			 ->whereRaw('FIND_IN_SET(?,field_name)', [$colname])
			 ->get();
	   OR
	$query = DB::table('tags_value')
         ->whereRaw('FIND_IN_SET(css,field_name)')
         ->get();   


 /*  Date Formats  */
 
 $rate['create_date'] = date('Y-m-d H:i:s');  // insert DB
 date('d-M-Y H:i:s',strtotime($wtdata->create_date));  //show view page
 
    */ Date Differnce */
  $now = new DateTime();
  $exp = new DateTime($row['time_expires']);
  $diff = $now->diff($exp); 
  
 /* Others */
 
 ->count() > 0 ? true : false;
 
 
 Route::get('validate/lang/{langkey}', 'LangController@langLoad');
 
 $siteConfig->support_email
 
 /* Request */ 
 
    $postdata = $this->request->all();
    $postdata = Input::all();
    $postdata = $this->request->except('submit_btn');
	$attachment = $this->request->file('file_attachment');
	
 /* Response */
 
   return response()->json($op); 
   return \Response::json($op,500);
   
 /* VIEW */
 
 $data = array();
		$data['email']=$this->userSess->email;
		$data['mobile']=$this->userSess->mobile;
		return view('user.security_settings',$data);
 
 /* Session */
 
 \Session::set($sess_key, array(
				'sess_key1'=>$sess_key,
				'new_email'=>$new_email,
				'account_id'=>$this->account_id,
				'verify_code'=>$verification_code));  
$res = Session::get('userdata');			
$res['reset_session'] = $sess_key;	
$res['reset_session']='';		
$user_session = Session::set('userdata',$res);		

//Using Blade file
<?php  $data = Session::all(); echo "<pre>"; print_r($data);exit; ?>
		
 /* Validater */
 
$rules = [            
  'email' => 'required|email|max:40|unique:'.config('tblconstants.ACCOUNT_MST'),
 ];
$messages = [
  'email.required' => trans('user/validator/change_email_js.email'),
  'email.email' => trans('user/validator/change_email_js.invalid_email'), 
  'email.max' => trans('user/validator/change_email_js.max_length') ,
  'email.unique' => trans('user/validator/change_email_js.unique'),
];
 $validator = Validator::make($postdata, $rules,$messages);
    if ($validator->fails())
	{	
		$errs = $validator->errors();
		foreach($rules  as $key=>$formats){
			$op['errs'][$key] =  $validator->errors()->first($key);			
		}
		return \Response::json($op,500);
	}
	//return $this->response->json($op, $this->config->get('httperr.SUCCESS'));
		
     /* Email Check */

    public function dsa_email_check ()
    {
        $op = array();
        $op = array(
            'status'=>422,
            'msg'=>trans('admin/dsa/dsa_edit.invalid_email'));
        $postdata = $this->request->all();
        if (!empty($postdata))
        {
            $rules = [
                'email'=>'required|email|max:40|unique:'.$this->config->get('tbl.ACCOUNT_MST').',email,'.$postdata['uname'].',uname',
            ];
            $messages = [
                'email.required'=>trans('admin/dsa/dsa_edit.enter_email'),
                'email.email'=>trans('admin/dsa/dsa_edit.invalid_email'),
                'email.max'=>trans('admin/dsa/dsa_edit.email_max_length'),
                'email.unique'=>trans('admin/dsa/dsa_edit.email_exist')
            ];
            $validator = Validator::make($postdata, $rules, $messages);

            if ($validator->fails())
            {
                $errs = $validator->errors();
                foreach ($rules as $key=> $formats)
                {
                    $op['errs'][$key] = $validator->errors()->first($key);
                }
                return $this->response->json($op, 400, $this->header, $this->options);
            }
            $op['status'] = 200;
            $op['msg'] = trans('admin/dsa/dsa_edit.email_availabel');
        }
        return $this->response->json($op, 200, $this->header, $this->options);
    }		
		
		
/* SMS Function */

use App\Library\Sendsms;
private $smsObj;
public function __construct ()
    {
        parent::__construct();
		$this->smsObj = new Sendsms;	
		$this->userObj = new User;	
    }
$sendsmsObj = new Sendsms();
					$sms = $sendsmsObj->send_sms(array(
						'uname'=>$this->userSess->uname,
						'phonecode'=>$this->userSess->phonecode,
						'mobile'=>$this->userSess->mobile,
						'site_name'=>$this->pagesettings->site_name,
							), Config('sms_service.email_update_notify'));

$res=$this->smsObj->send_sms(['reset_code'=>$verification_code,'phonecode'=>$this->userSess->phonecode,'mobile'=>$this->userSess->mobile,'site_name'=>$this->pagesettings->site_name],config('sms_service.EMAILUPDATE_RESETCODE'));

/* Mail Function */

use App\Library\MailerLib;

$email_data = array('email'=>$new_email);				
$data = array('email_verify_link'=>URL('account/settings/update_email').'?id='.$sess_key,'pagesettings'=>$this->pagesettings,'verification_code'=>$verification_code);
$htmls = View('emails.account.settings.update_email', $data)->render();
$mailstatus = new MailerLib(array(
					'to'=>$email_data['email'],
					'to'=> 'psuresh.ejugiter@gmail.com',
					'subject'=>'Verify Your Email-id',
					'html'=>$htmls,
					'from'=>Config('constants.SYSTEM_MAIL_ID'),
					'fromname'=>Config('constants.DOMAIN_NAME')
				)); 

/* LANG LANG2 OR TRANS */       *********************************************

   'check_email_inbox'=>'Please check your email inbox, We sent a verification code to :email',

  trans('user/validator/change_email_js.email');
  trans('user/settings/change_email.check_email_inbox',['email'=>$email_data['email']]);


/*  OTHERS  */
 
/* WWW  EXPLODE */
$res->deal_type=explode(',',$res->deal_type);
foreach($res->deal_type as $deal){
	$res->deal_types[] = trans('admin/retailer/deals.deal_types.'.$deal);
}
unset($res->deal_type);

/*  */
if (isset($search_term) && !empty($search_term))
{  
	if(!empty($filterchk) && !empty($filterchk))
	{  
		$search_term='%'.$search_term.'%'; 
		/* $search_field=['username'=>'acc.uname','fullname'=>'concat_ws(" ",ad.first_name,ad.last_name)','ticket_id'=>'t.ticket_code','subject'=>'t.subject']; */ 
		$search_field=['user'=>['acc.uname','concat_ws(" ",ad.first_name,ad.last_name)'],'ticket_id'=>'t.ticket_code','subject'=>'t.subject'];
		$tickets->where(function($query) use($filterchk,$search_term,$search_field)
			{			
				foreach($filterchk as $search) 
				{  
					if(array_key_exists($search,$search_field)){
						if(is_array($search_field[$search]))
						{
							foreach($search_field[$search] as $f) 
							{
								$query->orWhere(DB::raw($f),'like',$search_term);
							}
						}
						else
						{
							  $query->orWhere(DB::raw($search_field[$search]),'like',$search_term);
						} 
					}
				}
			});
	} else {	
		$tickets->where(function($query) use ($search_term){
			$query->where('acc.uname', 'LIKE', '%'.$search_term.'%')
			->orwhere(DB::Raw('concat_ws(" ",ad.first_name,ad.last_name) '),'LIKE', '%'.$search_term.'%')
			->orWhere('t.subject', 'LIKE', '%'.$search_term.'%')
			->orWhere('t.ticket_code', 'LIKE', '%'.$search_term.'%');
		});
	} 
} 

/* PHP VIEW RENDER START */
    public function ticket_details()
	{
		$op = array();
        $postdata = $this->request->all();
		if ($postdata['id'] != '') {
            $data['ticket_id'] = $postdata['id'];
			$data['account_id'] = $this->userSess->account_id;
            if (isset($postdata['status'])) {
                $vdata['status'] = $postdata['status'];
            }
            $vdata['detail'] = $this->supportObj->retailer_ticket($data);
            $vdata['comments']  = $this->supportObj->get_reply_message($data);
			
	        if(count($vdata['detail']) > 0){
			    $str = view('retailer.support.ticket_details',$vdata);
                $op['contents'] = $str->render();
                $op['status'] 	= 'ok';
            }
        }
        echo json_encode($op);
	}  
	
	/* RENDER JS */
	if(data.status == 'ok'){
		$('#member_list').hide();
		$('#details_box').show();
		$('#details_box .block').html(data.contents);
	}
/* PHP VIEW RENDER END */




$order->bill_amount = CommonLib::currency_format($order->bill_amount, ['currency_symbol'=>$order->currency_symbol,'currency_code'=>$order->currency_code,'decimal_places'=>$order->decimal_places]);
$order->cashback_amount = CommonLib::currency_format($order->cashback_amount, ['currency_symbol'=>$order->currency_symbol,'currency_code'=>$order->currency_code,'decimal_places'=>$order->decimal_places]);

/* ERROR Funtion Controller */
error: function (jqXHR, textStatus, errorThrown) {
	$('body').toggleClass('loaded');	alert('qqq');
	//$('#update_faq_details').attr('disabled',false);
	responseText = $.parseJSON(jqXHR.responseText);
	console.log(responseText);
	$.each(responseText.error,function(fld,msg){
		if($('#category_editfrm [name='+fld+']').parent().hasClass('input-group')){
			$('#category_editfrm [name='+fld+']').parent().after("<div class='help-block'>"+msg+"</div>");
		}else {
			$('#category_editfrm [name='+fld+']').after("<div class='help-block'>"+msg+"</div>");
		}
	}); 
}  

/* CONTROLLER VALIDATION UNIQUE */

 // Single Where
 This is checking single where condition
 'email' => 'required|email|max:40|unique:'.config('tbl.ACCOUNT_MST').',email,parthiban.ejugiter@gmail.com,email',
  
   which fileld is unique -> 'email' 
   ignore value or email Id -> 'parthiban.ejugiter@gmail.com'
   ignore value check which field -> 'email'
  
 The unique rule takes some additional parameters for just this purpose which looks like  
 / unique:table,column,except,idColumn  /

So in your case, except would be the id and idColumn would be the name of the column of your id, probably id.

So with that in mind, you'd want your validation rule to be...

'required|unique:customers,phone_num,'.$id.',id'

$this->validate($request, [
    'email' => [
        'required',
        Rule::unique('users')->ignore($user->id),
    ],
]);'

    // Mutiple Where
	This is checking Multiple where condition
  'email' => 'required|email|max:40|unique:'.config('tbl.ACCOUNT_MST').',email,parthiban.ejugiter@gmail.com,email,acc_id,0,status,0',
  
    //NEW
	'designation'=>'required|min:3|max:150|regex:/^[a-zA-Z ]+$/|unique:'.config('tbl.MERCHANT_SUB_ACCOUNTS_DESIGNATION').',designation,'.(request()->has('designation_id')?request()->get('designation_id').',id':'NULL,id').',mrid,::mrid,is_deleted,0',

 /* DIRECTORYS VIDEOS */
 
if (!file_exists($dir) && !is_dir($dir)) {
    mkdir($dir);         
} 

if (!file_exists('path/to/directory')) {
    mkdir('path/to/directory', 0777, true);
}
 if ($request->hasFile('video')) {
   $newDir = public_path('videos\\' . $story->story_id);
   File::makeDirectory( $newDir, 0755, true);
   $request->file('video')->move($newDir);
}
 
/* ORDER BY */
if (isset($orderby) && isset($order))
	{
	   if($orderby == 'uname'){
			$query->orderBy('um.'.$orderby, $order);
	   }elseif($orderby == 'full_name'){
			$query->orderBy('ud.first_name', $order);
	   }elseif($orderby=='sponser_uname'){
			$query->orderBy('spum.uname', $order);
	   }elseif($orderby=='level'){
			$query->orderBy('ut.level', $order);
	   }elseif($orderby=='package_name'){
			$query->orderBy('pl.'.$orderby, $order);
	   }elseif($orderby=='purchased_on'){
			$query->orderBy('ut.recent_package_purchased_on', $order);
	   }elseif($orderby=='signedup_on'){
			$query->orderBy('um.'.$orderby, $order);
	   }elseif($orderby=='status'){
			$query->orderBy('um.'.$orderby, $order);
	   }
	}
	
/* FilterCheck 1 */
	if(!empty($filterchk))
	{
		foreach($filterchk as $search)
		{
			if($search=='UserName'){
				$query->WhereRaw("um.uname like '%$search_term%'");
			}
			else if($search=='FullName'){
				$query->whereRaw("CONCAT_WS('',ud.first_name,ud.last_name) like '%$search_term%'");
			}	
			else if($search=='InvitedBy'){
				$query->whereRaw("spum.uname like '%$search_term%'");
			}	
		}
	}else
	{
		$query->where(function($wcond) use($search_term){
		   $wcond->WhereRaw("um.uname like '%$search_term%'")
				->orwhereRaw("CONCAT_WS('',ud.first_name,ud.last_name) like '%$search_term%'")
				->orwhereRaw("spum.uname like '%$search_term%'");
		}); 
	}	
	
/* FilterCheck 2 */
	$search_term = '%'.$search_term.'%';
	$search_feilds = ['uname'=>'a.uname', 'full_name'=>'concat(b.first_name," ",b.last_name)', 'mobile'=>'concat(b.phonecode," ",b.mobile)', 'referrer'=>'ru.uname', 'email'=>'a.email'];
	if (isset($search_feild) && !empty($search_feild) && isset($search_feilds[$search_feild]))
	{
		$users->where(DB::raw($search_feilds[$search_feild]), 'like', $search_term);
	}
	else
	{
		$users = $users->where(function($sub) use($search_term)
		{
			$sub->where('a.uname', 'like', $search_term);
			$sub->orWhere(DB::raw('concat(b.first_name," ",b.last_name)'), 'like', $search_term);
			$sub->orWhere(DB::raw('concat(b.phonecode," ",b.mobile)'), 'like', $search_term);
			$sub->orWhere('ru.uname', 'like', $search_term);
			$sub->orWhere('a.email', 'like', $search_term);
		});
	}
	
/* FilterCheck 3 Working */
if (isset($search_term) && !empty($search_term))
	{	
		if(!empty($filterchk) && !empty($filterchk)
		{   
			$search_term='%'.$search_term.'%'; 
			$search_field=['UserName'=>'um.uname','FullName'=>'CONCAT_WS("",ud.first_name,ud.last_name)','InvitedBy'=>'spum.uname'];
			$query->where(function($sub) use($filterchk,$search_term,$search_field){
				foreach($filterchk as $search)
				{   
					if(array_key_exists($search,$search_field)){
					  $sub->Where(DB::raw($search_field[$search]),'like',$search_term);
					} 
				}
			}
		}else{
			$query->where(function($wcond) use($search_term){
			   $wcond->Where('um.uname','like',$search_term)
					 ->orwhere(DB::raw('CONCAT_WS("",ud.first_name,ud.last_name)'),'like',$search_term)
					 ->orwhere('spum.uname','like',$search_term);
			}); 
		} 			
	}

/* Redirect or logout */
	public function logout ()
    {
        if (isset($this->userSess->store_id))
        {
            $this->accountObj->logoutStaff(['store_id'=>$this->userSess->store_id, 'account_id'=>$this->userSess->account_id]);
        }
        //$this->session->forget($this->config->get('app.role')); $this->sessionName
        $this->session->forget($this->sessionName);
        return redirect('retailer/login');
		return redirect()->route('user.home');
    }
/* SWITCH CASE */
array_walk($query, function(&$data)
{
	$data->signedup_on= date('d-M-Y H:i:s', strtotime($data->signedup_on));
	$data->recent_package_purchased_on= date('d-M-Y H:i:s', strtotime($data->recent_package_purchased_on));
	switch($data->status_name)
	{
		case 'Inactive':
						$data->status_name_label  = '<label class="label label-danger">'.$data->status_name.'</label>';
						break;
		case 'Active':	
						$data->status_name_label  = '<label class="label label-success">'.$data->status_name.'</label>';
						break;		
	}
});

/* MAIL PRINT */
   Config::set('mail', $config);
   //echo view($view, $data)->render(); exit;

 /* Fousin  & Remove */
    $('#member_updatefrm').on('focusin', 'input, select', function (e) {
	$(this).parents('.form-group').find('div.help-block').remove();
   });
	

/* PHP Functions */

// Rupees INDIAN Currency format
$amount = '100000';
setlocale(LC_MONETARY, 'en_IN');
$amount = money_format('%!i', $amount);
echo $amount;

Output:

1,00,000.00


/* TRNAS */

'redeem_notes'=>['desc'=>'You can easily redeem from your phone no printout required. See how', 'steps'=>'<ul><li><span>Step 1</span><p>When at the outlet, open your voucher (IT\'s in the Purchase tab under My XPayBack )</p><img src="http://localhost/cashbackbid_v2/imgs/profile-img/100/100/test.png"></li><li><span>Step 2</span><p>Inform the staff you will be redeeming your vouchers, then swipe to reddep it</p><img src="http://localhost/cashbackbid_v2/imgs/profile-img/100/100/test.png"></li><li><span>Step 3</span><p>Inform the staff you will be redeeming your vouchers, then swipe to reddep it</p><img src="http://localhost/cashbackbid_v2/imgs/profile-img/100/100/test.png"></li><ul>'],


/* LinkS */

http://phpqrcode.sourceforge.net/
https://stackoverflow.com/questions/5943368/dynamically-generating-a-qr-code-with-php
https://github.com/kazuhikoarase/qrcode-generator/tree/master/php
http://www.onlinewritingtraining.com.au/2017/04/18/staff-or-staffs/   // ENglish 
https://www.tutorialrepublic.com/php-tutorial/php-regular-expressions.php
https://www.guru99.com/php-regular-expressions.html#1
https://developers.google.com/web/  Google develope team
https://www.cloudways.com/blog/controllers-middleware-laravel/  Multiple Php frameworks
http://webcheatsheet.com/php/sorting_array.php   array reverse
https://www.javatpoint.com/creating-thread  thread javascript
https://laravel.io/  Refer laravel php

MY -

https://developer.chrome.com/apps/first_app   app create
https://stackoverflow.com/questions/20409349/what-is-the-easiest-way-to-develop-firefox-extension
https://developer.chrome.com/extensions/getstarted
https://laravel-tricks.com/tricks/session-timeout-for-logged-in-user     larvel tricks
https://www.thoughtco.com/grouping-multiple-css-selectors-3467065   multiple progrm langs
https://hackernoon.com/restful-api-designing-guidelines-the-best-practices-60e1d954e7c9
https://dzone.com/articles/7-performance-optimization-tips-for-your-laravel-d or  -d-M-Y
https://www.sothebys.com/en/registration/forgot-password-change/success.html
https://www.google.co.in/search?q=%5Cs+in+php&oq=%5Cs+in+php&aqs=chrome..69i57j35i39j0l4.8943j0j8&sourceid=chrome&ie=UTF-8  \s in php
http://www.itjungles.com/php-check-if-array-is-empty-or-null.html  IT 
http://www.zentut.com/php-tutorial/php-file-exists/
https://www.if-not-true-then-false.com/2010/php-remove-last-character-from-string/  BEST
https://www.newmediacampaigns.com/blog/add-text-to-an-image-with-php   New Site

https://www.qr-code-generator.com/pricing/   QRCODE site Chating Style Super
http://www.codescratcher.com/javascript/print-image-using-javascript/    QRCODE Print

*@$ MY WEB @$*
https://mailchimp.com/?utm_source=phd-investment&utm_medium=carbon&utm_campaign=always-on-2018&utm_term=prospect&utm_content=international-india-equity-developercircle-carbons2mc01copy
https://www.cssfontstack.com/Arial            Font Reference
http://www.devshed.com/newsletter-signup/     DEveloper
https://scotch.io/tutorials/deep-dive-into-custom-validation-error-messages-in-laravel   Hee

https://www.geeksforgeeks.org/php-in_array-function/   PHP Tutorials
http://phpfiddle.org/    PHP Tutorials

https://www.tutorialrepublic.com/php-tutorial/php-data-types.php    PHP Tutorials

/* 
	
	
	 /*foreach ($store_id as $k=> $v)
                    {
					    $cunt=0;	
                        array_walk($res->stores[$city_id], function(&$value) use($store_id,$v,&$cunt)
                        {
                            if (isset($value->checked) && empty($value->checked))
                            {
                                if ($v == $value->store_id)
                                {
                                    $value->checked = 1;
									$cunt = $cunt++;
                                }
                            }
                            else
                            {
                                if (!isset($value->checked))
                                {
                                    $value->checked = ($v == $value->store_id) ? 1 : 0;
									if(!empty($value->checked)){
									    $cunt = $cunt++;
									}
                                }
                            }
                        });
						$res->stores[$city_id]['selected_stores'] = $cunt;
                    } /*
	
	*/
?>