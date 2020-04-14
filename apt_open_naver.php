<?php

echo ("
<html xmlns='http://www.w3.org/1999/xhtml' lang='ko' xml:lang='ko'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<meta name='Viewport' content='width=device-width, initial-scale=1.0, user-scalable=no, target-densitydpi=device-dpi' />
<title></title>

<style>	
	{
	  box-sizing: border-box;
	  -moz-box-sizing: border-box;
	  -webkit-box-sizing: border-box;
	}


	/* noto-sans-kr-regular - korean_latin */
	@font-face {
	  font-family: 'Noto Sans KR';
	  font-style: normal;
	  font-weight: 400;
	  src: url('../fonts/noto-sans-kr-v12-korean_latin-regular.eot'); /* IE9 Compat Modes */
	  src: local('Noto Sans KR Regular'), local('NotoSansKR-Regular'),
		   url('../fonts/noto-sans-kr-v12-korean_latin-regular.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
		   url('../fonts/noto-sans-kr-v12-korean_latin-regular.woff2') format('woff2'), /* Super Modern Browsers */
		   url('../fonts/noto-sans-kr-v12-korean_latin-regular.woff') format('woff'), /* Modern Browsers */
		   url('../fonts/noto-sans-kr-v12-korean_latin-regular.ttf') format('truetype'), /* Safari, Android, iOS */
		   url('../fonts/noto-sans-kr-v12-korean_latin-regular.svg#NotoSansKR') format('svg'); /* Legacy iOS */
	}

	BODY {font-size:15px; font-family:'Noto Sans KR',verdana,tahoma; color:black; line-height:160%;}
	BODY {padding:0; margin:auto; background-color: #eadca3;}
	TABLE {width:100%; padding:0; margin:0; border-spacing:0;}
	TABLE, TD {word-break:break-all; }
	TR:nth-child(even) {background-color:white;}
	A:link {color:#000000; text-decoration:none;}  
	A:visited {color:#000000; text-decoration:none;}  
	A:active {color:#000000; text-decoration:none;} 
	A:hover {color:#000000; text-decoration:none;} 

	.title1_td {text-align:center; width:20%; height:35px; background-color:#eadca3; border-bottom:solid 2pt #b33951;}
	.content_td1 {vertical-align:top; line-height:150%; height:55px; padding:2px 5px 5px 5px; border-bottom:dashed 1pt #b33951;}
	.content_td0 {vertical-align:top; line-height:150%; height:55px; padding:2px 5px 5px 5px; border-bottom:dashed 1pt #b33951; background-color:#91c7b1}

</style>
<script>
	function view_submenu(id){
		temp=document.getElementById(id).style.display
		if(temp=='none'){
			document.getElementById(id).style.display='block';
		} else {
			document.getElementById(id).style.display='none';
		}
	}
</script>
</head>
<body>
	");
	$today=date("Y-m-d");
	$url=array(
		'https://m.land.naver.com/complex/getComplexArticleList?hscpNo=101241&tradTpCd=A1&ptpNo=2:1&order=date_&showR0=N&page=1',
		'https://m.land.naver.com/complex/getComplexArticleList?hscpNo=101242&tradTpCd=A1&ptpNo=2:1&order=date_&showR0=N&page=1',
		'https://m.land.naver.com/complex/getComplexArticleList?hscpNo=104899&tradTpCd=A1&ptpNo=7:8&order=date_&showR0=N&page=1',
		'https://m.land.naver.com/complex/getComplexArticleList?hscpNo=27146&tradTpCd=A1&ptpNo=7:9&order=date_&showR0=N&page=1',
		'https://m.land.naver.com/complex/getComplexArticleList?hscpNo=27447&tradTpCd=A1&ptpNo=6&order=date_&showR0=N&page=1',
		'https://m.land.naver.com/complex/getComplexArticleList?hscpNo=100399&tradTpCd=A1&ptpNo=5:3:2&order=date_&showR0=N&page=1'); //네이버 부동산

	$url_price=array(
		array(
			'https://m.land.naver.com/detail/getRealPriceInfo?hscpNo=101241&ptpNo=2&ptpNoForRealPrice=2&tradTpCd=A1&maxTradYm=99991231&addedItemTotalCnt=0', 'https://m.land.naver.com/detail/getRealPriceInfo?hscpNo=101241&ptpNo=1&ptpNoForRealPrice=1&tradTpCd=A1&maxTradYm=99991231&addedItemTotalCnt=0'),
		array(
			'https://m.land.naver.com/detail/getRealPriceInfo?hscpNo=101242&ptpNo=2&ptpNoForRealPrice=2&tradTpCd=A1&maxTradYm=99991231&addedItemTotalCnt=0', 'https://m.land.naver.com/detail/getRealPriceInfo?hscpNo=101242&ptpNo=1&ptpNoForRealPrice=1&tradTpCd=A1&maxTradYm=99991231&addedItemTotalCnt=0'),
		array(
			'https://m.land.naver.com/detail/getRealPriceInfo?hscpNo=104899&ptpNo=7&ptpNoForRealPrice=7&tradTpCd=A1&maxTradYm=99991231&addedItemTotalCnt=0', 'https://m.land.naver.com/detail/getRealPriceInfo?hscpNo=104899&ptpNo=8&ptpNoForRealPrice=8&tradTpCd=A1&maxTradYm=99991231&addedItemTotalCnt=0'),
		array(
			'https://m.land.naver.com/detail/getRealPriceInfo?hscpNo=27146&ptpNo=7&ptpNoForRealPrice=7&tradTpCd=A1&maxTradYm=99991231&addedItemTotalCnt=0', 'https://m.land.naver.com/detail/getRealPriceInfo?hscpNo=27146&ptpNo=9&ptpNoForRealPrice=9&tradTpCd=A1&maxTradYm=99991231&addedItemTotalCnt=0'),
		array(
			'https://m.land.naver.com/detail/getRealPriceInfo?hscpNo=27447&ptpNo=6&ptpNoForRealPrice=6&tradTpCd=A1&maxTradYm=99991231&addedItemTotalCnt=0'),
		array(
			'https://m.land.naver.com/detail/getRealPriceInfo?hscpNo=100399&ptpNo=5&ptpNoForRealPrice=5&tradTpCd=A1&maxTradYm=99991231&addedItemTotalCnt=0', 'https://m.land.naver.com/detail/getRealPriceInfo?hscpNo=100399&ptpNo=3&ptpNoForRealPrice=3&tradTpCd=A1&maxTradYm=99991231&addedItemTotalCnt=0',
			'https://m.land.naver.com/detail/getRealPriceInfo?hscpNo=100399&ptpNo=2&ptpNoForRealPrice=2&tradTpCd=A1&maxTradYm=99991231&addedItemTotalCnt=0')); //실거래가

	$url_type=array(
		array('162-49', '174-52'),
		array('162-49', '174-52'),
		array('157-47', '182-55'),
		array('154C-46C', '191-57'),
		array('176-53'),
		array('151A-45A', '194-58', '196-59')); //아파트 평형

	$apt_name=array(
		'더샵그린애비뉴 7단지',
		'더샵그린애비뉴 8단지',
		'더샵엑스포 9단지',
		'더샵하버뷰 13단지',
		'더샵하버뷰 14단지',
		'더샵하버뷰II 15단지'); //아파트 이름

	$curlsession = curl_init();	
	$headers=array('User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.220 Whale/1.3.51.7 Safari/537.36', 'Referer: https://m.land.naver.com/');
	curl_setopt($curlsession, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curlsession, CURLOPT_CONNECTTIMEOUT ,0);
	curl_setopt($curlsession, CURLOPT_RETURNTRANSFER, true);
	curl_setopt ($curlsession, CURLOPT_SSL_VERIFYPEER, FALSE); // 인증서 체크같은데 true 시 안되는 경우가 많다.
	// default 값이 true 이기때문에 이부분을 조심 (https 접속시에 필요)
	//curl_setopt($curlsession, CURLOPT_POSTFIELDS, $post);
	//curl_setopt($curlsession, CURLOPT_TIMEOUT, $timeout);
	//curl_setopt($curlsession, CURLOPT_SSL_VERIFYHOST, false);

	for ($n=0;$n<sizeof($url);$n++){
		
		curl_setopt($curlsession, CURLOPT_URL, $url[$n]); //네이버 부동산
		$result = curl_exec($curlsession);
		$curl_info = curl_getinfo($curlsession);
		$session = json_decode($result, true);
		$apt_list=$session["result"]["list"];
		$no_apt_list=$session["result"]["totAtclCnt"];	


		echo ("
<table border=0>
	<tr>
		<td style='text-align:center; height:40px; background-color:#b33951;'><b>$apt_name[$n] ($no_apt_list)</b></td>
	</tr>
</table>
<table border=0>
		");

		for ($i=0; $i<$no_apt_list; $i++){
			$apt_detail=$apt_list[$i];
			$apt_detail_tag=$apt_detail['tagList'];
			if($apt_detail['sameAddrMaxPrc']==$apt_detail['sameAddrMinPrc']){
				$apt_money=$apt_detail['prcInfo'];
			} else {
				$apt_money=$apt_detail['sameAddrMinPrc']."~".$apt_detail['sameAddrMaxPrc'];
			}
			$apt_type=floor($apt_detail['spc1']);
			if(!isset($apt_detail['atclFetrDesc'])) $apt_detail['atclFetrDesc']="";
			if($apt_detail['tradCmplYn']=="Y"){
				$tradCmplYn="[완료]";
			} else {
				$tradCmplYn="";
			}
			
			$date=str_replace(".", "-", $apt_detail['cfmYmd']);
			$start = new DateTime($date); 
			$end = new DateTime($today); 
			$days = round(($end->format('U') - $start->format('U')) / (60*60*24)); 
			if($days<3) $class="content_td0"; else $class="content_td1";

			echo ("
	<tr>
		<td class=$class onClick=\"location.href='https://m.land.naver.com/article/info/$apt_detail[atclNo]';\" style='cursor:pointer;'>
			<table border=0>
				<tr>				
					<td width=60 style='text-align:center;'><b>$apt_detail[bildNm]</b></td>
					<td width=40>$apt_type</td>
					<td width=50>$apt_detail[flrInfo]</td>
					<td style='text-align:center;'>$apt_money</td>
					<td width=80 style='text-align:center;'><i>$apt_detail[cfmYmd]</i></td>
				</tr>
			</table>
			<table border=0>
				<tr>				
					<td width=60 style='text-align:center; vertical-align:top;'><b>$tradCmplYn</b></td>
					<td width=40 style='font-size:13px; vertical-align:top;'>$apt_detail[direction]</td>
					<td style='font-size:13px;'>$apt_detail[rltrNm], $apt_detail_tag[0], $apt_detail_tag[1], $apt_detail_tag[2], $apt_detail_tag[3]<br>$apt_detail[atclFetrDesc]</td>
				</tr>
			</table>
		</td>
	</tr>
			");
		}

		echo ("
</table>
<div style='padding:2 0 2 15;'><b style='cursor:pointer;' onclick=\"view_submenu('price{$n}');\">실거래가</b></div>


<div id='price{$n}' style='display:none; background-color:#f1f7ed;'>
		");
		
		for ($j=0; $j<sizeof($url_price[$n]); $j++){ // 네이버 실거래가
			curl_setopt($curlsession, CURLOPT_URL, $url_price[$n][$j]);
			$apt_type=$url_type[$n][$j];
			echo ("
<div style='padding:3 0 0 15;'><b>{$apt_type}평형</b></div>
			");
			$result = curl_exec($curlsession);
			$session = json_decode($result, true);
			$price_list=$session["realPriceInfo"]["list"];
			foreach ($price_list as $price_list_sub){
				$price_list_sub2=$price_list_sub['a1realPriceList'];
				foreach ($price_list_sub2 as $price_list_sub3){
					$year=substr($price_list_sub3['tradYm'],0,4);
					$month=substr($price_list_sub3['tradYm'],4,5);
					if(strlen($price_list_sub3['tradeDate'])==1) $price_list_sub3['tradeDate']="0".$price_list_sub3['tradeDate'];
					if ($year>2017){
						echo ("
<span style='display:inline-block; width:110px; text-align:center; padding-left:15;'>{$year}-{$month}-{$price_list_sub3['tradeDate']}</span><span style='display:inline-block; width:80px; text-align:left;'>$price_list_sub3[priceString]</span><span style='display:inline-block; text-align:left;'>({$price_list_sub3['coresFlrCnt']}층)</span><br>
						");
					}
				}				
			}
		}
		echo("
<div style='border-bottom:dashed 1pt #b33951;padding-top:3;'></div>
</div>
<br><br>
		");
	}

	curl_close ($curlsession);

	echo ("
</body>
</html>
	");

?>
