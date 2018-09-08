<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Institution Details</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">institution details</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid --->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Institution Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="institution_error" style="display: none;" class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              </div>
              <div id="institution_success" style="display: none;" class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              </div>
              <!-- Default form contact -->
                <form id="institution_form" method="post" role="form" action="<?php echo site_url('/general_setting/add_institution') ?>"
                      data-action="<?php echo site_url('/general_setting/add_institution') ?>"  enctype="multipart/form-data">
                <!-- Name -->
                <label><code>*</code>Name</label>
                <input type="text" id="name" value="<?php echo isset($institution_detail['name'])&&(!empty($institution_detail['name']))?$institution_detail['name']:'' ?>"
                       name="name" class="form-control mb-4" placeholder="Example High School" required>
                <!-- Name abbreviation -->
                <label><code>*</code>Name abbreviation</label>
                <input type="text" id="code" value="<?php echo isset($institution_detail['code'])&&(!empty($institution_detail['code']))?$institution_detail['code']:'' ?>"
                       name="code" class="form-control mb-4" placeholder="MHS" required>
                <!-- Subdomain -->
                <label><code>*</code>Subdomain</label>
                <input type="text" id="subdomain" name="subdomain" value="<?php echo isset($institution_detail['subdomain'])&&(!empty($institution_detail['subdomain']))?$institution_detail['subdomain']:'' ?>"
                       class="form-control mb-4" placeholder="demo" required>
                <!-- Slogan -->
                <label> Slogan</label>
                <input type="text" id="slogan" name="slogan" value="<?php echo isset($institution_detail['slogan'])&&(!empty($institution_detail['slogan']))?$institution_detail['slogan']:'' ?>"
                       class="form-control mb-4" placeholder="Quality Education Our Priority">
                <!-- Email -->
                <label>Email</label>
                <input type="email" id="email" name="email" value="<?php echo isset($institution_detail['email'])&&(!empty($institution_detail['email']))?$institution_detail['email']:'' ?>"
                       class="form-control mb-4" placeholder="masindihigh@gmail.com">
                <!-- Website -->
                <label> Website</label>
                <input type="text" id="website" name="website" value="<?php echo isset($institution_detail['website'])&&(!empty($institution_detail['website']))?$institution_detail['website']:'' ?>"
                       class="form-control mb-4" placeholder="www.masindihigh.com">
                <!-- Phone -->
                <label>Phone</label>
                <input type="text" id="phone" name="phone" value="<?php echo isset($institution_detail['phone'])&&(!empty($institution_detail['phone']))?$institution_detail['phone']:'' ?>"
                       class="form-control mb-4" placeholder="+2349078347848">
                <!-- Mobile Phone -->
                <label>Mobile Phone</label>
                <input type="text" id="mobile" name="mobile" value="<?php echo isset($institution_detail['mobile'])&&(!empty($institution_detail['mobile']))?$institution_detail['mobile']:'' ?>"
                       class="form-control mb-4" placeholder="+2349078347848">
                <!-- Message -->
                <div class="form-group">
                  <label>Address</label>
                    <textarea class="form-control rounded-0" id="address" name="address" rows="3"><?php echo isset($institution_detail['address'])&&(!empty($institution_detail['address']))?$institution_detail['address']:'' ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Logo</label>
                  <div class="input-group">
                      <input type="file" name="logo" id="fileToUpload">
                  </div>
               </div>
                 <!-- Subject -->
                <div class="form-group">
                  <label>Currency</label>
                  <select class=" form-control select2 mb-4"  width="100%" name="currency">
                          <option value="ngn">Nigerian Naira - NGN</option>
                          <option value="ghc">Ghanaian Cedi - GHS</option>
                          <option value="kes">Kenyan Shilling - KES</option><option value="" disabled="disabled">-------------</option>
                          <option value="afn">Afghan Afghani - AFN</option>
                          <option value="all">Albanian Lek - ALL</option>
                          <option value="dzd">Algerian Dinar - DZD</option>
                          <option value="aoa">Angolan Kwanza - AOA</option>
                          <option value="ars">Argentine Peso - ARS</option>
                          <option value="amd">Armenian Dram - AMD</option>
                          <option value="awg">Aruban Florin - AWG</option>
                          <option value="aud">Australian Dollar - AUD</option>
                          <option value="azn">Azerbaijani Manat - AZN</option>
                          <option value="bsd">Bahamian Dollar - BSD</option>
                          <option value="bhd">Bahraini Dinar - BHD</option>
                          <option value="bdt">Bangladeshi Taka - BDT</option>
                          <option value="bbd">Barbadian Dollar - BBD</option>
                          <option value="byn">Belarusian Ruble - BYN</option>
                          <option value="byr">Belarusian Ruble - BYR</option>
                          <option value="bzd">Belize Dollar - BZD</option>
                          <option value="bmd">Bermudian Dollar - BMD</option>
                          <option value="btn">Bhutanese Ngultrum - BTN</option>
                          <option value="btc">Bitcoin - BTC</option>
                          <option value="bob">Bolivian Boliviano - BOB</option>
                          <option value="bam">Bosnia and Herzegovina Convertible Mark - BAM</option>
                          <option value="bwp">Botswana Pula - BWP</option>
                          <option value="brl">Brazilian Real - BRL</option>
                          <option value="gbx">British Penny - GBX</option>
                          <option value="gbp">British Pound - GBP</option>
                          <option value="bnd">Brunei Dollar - BND</option>
                          <option value="bgn">Bulgarian Lev - BGN</option>
                          <option value="bif">Burundian Franc - BIF</option>
                          <option value="khr">Cambodian Riel - KHR</option>
                          <option value="cad">Canadian Dollar - CAD</option>
                          <option value="cve">Cape Verdean Escudo - CVE</option>
                          <option value="kyd">Cayman Islands Dollar - KYD</option>
                          <option value="xaf">Central African Cfa Franc - XAF</option>
                          <option value="xpf">Cfp Franc - XPF</option>
                          <option value="clp">Chilean Peso - CLP</option>
                          <option value="cny">Chinese Renminbi Yuan - CNY</option>
                          <option value="cnh">Chinese Renminbi Yuan Offshore - CNH</option>
                          <option value="xts">Codes specifically reserved for testing purposes - XTS</option>
                          <option value="cop">Colombian Peso - COP</option>
                          <option value="kmf">Comorian Franc - KMF</option>
                          <option value="cdf">Congolese Franc - CDF</option>
                          <option value="crc">Costa Rican Colón - CRC</option>
                          <option value="hrk">Croatian Kuna - HRK</option>
                          <option value="cuc">Cuban Convertible Peso - CUC</option>
                          <option value="cup">Cuban Peso - CUP</option>
                          <option value="czk">Czech Koruna - CZK</option>
                          <option value="dkk">Danish Krone - DKK</option>
                          <option value="djf">Djiboutian Franc - DJF</option>
                          <option value="dop">Dominican Peso - DOP</option>
                          <option value="xcd">East Caribbean Dollar - XCD</option>
                          <option value="egp">Egyptian Pound - EGP</option>
                          <option value="ern">Eritrean Nakfa - ERN</option>
                          <option value="eek">Estonian Kroon - EEK</option>
                          <option value="etb">Ethiopian Birr - ETB</option>
                          <option value="eur">Euro - EUR</option>
                          <option value="xba">European Composite Unit - XBA</option>
                          <option value="xbb">European Monetary Unit - XBB</option>
                          <option value="xbd">European Unit of Account 17 - XBD</option>
                          <option value="xbc">European Unit of Account 9 - XBC</option>
                          <option value="fkp">Falkland Pound - FKP</option>
                          <option value="fjd">Fijian Dollar - FJD</option>
                          <option value="gmd">Gambian Dalasi - GMD</option>
                          <option value="gel">Georgian Lari - GEL</option>
                          <option value="ghs">Ghanaian Cedi - GHS</option>
                          <option value="ghc">Ghanaian Cedi - GHS</option>
                          <option value="gip">Gibraltar Pound - GIP</option>
                          <option value="xau">Gold (Troy Ounce) - XAU</option>
                          <option value="gtq">Guatemalan Quetzal - GTQ</option>
                          <option value="ggp">Guernsey Pound - GGP</option>
                          <option value="gnf">Guinean Franc - GNF</option>
                          <option value="gyd">Guyanese Dollar - GYD</option>
                          <option value="htg">Haitian Gourde - HTG</option>
                          <option value="hnl">Honduran Lempira - HNL</option>
                          <option value="hkd">Hong Kong Dollar - HKD</option>
                          <option value="huf">Hungarian Forint - HUF</option>
                          <option value="isk">Icelandic Króna - ISK</option>
                          <option value="inr">Indian Rupee - INR</option>
                          <option value="idr">Indonesian Rupiah - IDR</option>
                          <option value="irr">Iranian Rial - IRR</option>
                          <option value="iqd">Iraqi Dinar - IQD</option>
                          <option value="imp">Isle of Man Pound - IMP</option>
                          <option value="ils">Israeli New Sheqel - ILS</option>
                          <option value="jmd">Jamaican Dollar - JMD</option>
                          <option value="jpy">Japanese Yen - JPY</option>
                          <option value="yen">Japanese Yen - JPY</option>
                          <option value="jep">Jersey Pound - JEP</option>
                          <option value="jod">Jordanian Dinar - JOD</option>
                          <option value="kzt">Kazakhstani Tenge - KZT</option>
                          <option value="kes">Kenyan Shilling - KES</option>
                          <option value="kwd">Kuwaiti Dinar - KWD</option>
                          <option value="kgs">Kyrgyzstani Som - KGS</option>
                          <option value="lak">Lao Kip - LAK</option>
                          <option value="lvl">Latvian Lats - LVL</option>
                          <option value="lbp">Lebanese Pound - LBP</option>
                          <option value="lsl">Lesotho Loti - LSL</option>
                          <option value="lrd">Liberian Dollar - LRD</option>
                          <option value="lyd">Libyan Dinar - LYD</option>
                          <option value="ltl">Lithuanian Litas - LTL</option>
                          <option value="mop">Macanese Pataca - MOP</option>
                          <option value="mkd">Macedonian Denar - MKD</option>
                          <option value="mga">Malagasy Ariary - MGA</option>
                          <option value="mwk">Malawian Kwacha - MWK</option>
                          <option value="myr">Malaysian Ringgit - MYR</option>
                          <option value="mvr">Maldivian Rufiyaa - MVR</option>
                          <option value="mtl">Maltese Lira - MTL</option>
                          <option value="mro">Mauritanian Ouguiya - MRO</option>
                          <option value="mur">Mauritian Rupee - MUR</option>
                          <option value="mxn">Mexican Peso - MXN</option>
                          <option value="mdl">Moldovan Leu - MDL</option>
                          <option value="mnt">Mongolian Tögrög - MNT</option>
                          <option value="mad">Moroccan Dirham - MAD</option>
                          <option value="mzn">Mozambican Metical - MZN</option>
                          <option value="mmk">Myanmar Kyat - MMK</option>
                          <option value="nad">Namibian Dollar - NAD</option>
                          <option value="npr">Nepalese Rupee - NPR</option>
                          <option value="ang">Netherlands Antillean Gulden - ANG</option>
                          <option value="twd">New Taiwan Dollar - TWD</option>
                          <option value="nzd">New Zealand Dollar - NZD</option>
                          <option value="nio">Nicaraguan Córdoba - NIO</option>
                          <option value="ngn">Nigerian Naira - NGN</option>
                          <option value="kpw">North Korean Won - KPW</option>
                          <option value="nok">Norwegian Krone - NOK</option>
                          <option value="omr">Omani Rial - OMR</option>
                          <option value="pkr">Pakistani Rupee - PKR</option>
                          <option value="xpd">Palladium - XPD</option>
                          <option value="pab">Panamanian Balboa - PAB</option>
                          <option value="pgk">Papua New Guinean Kina - PGK</option>
                          <option value="pyg">Paraguayan Guaraní - PYG</option>
                          <option value="pen">Peruvian Sol - PEN</option>
                          <option value="php">Philippine Peso - PHP</option>
                          <option value="xpt">Platinum - XPT</option>
                          <option value="pln">Polish Złoty - PLN</option>
                          <option value="qar">Qatari Riyal - QAR</option>
                          <option value="ron">Romanian Leu - RON</option>
                          <option value="rub">Russian Ruble - RUB</option>
                          <option value="rwf">Rwandan Franc - RWF</option>
                          <option value="shp">Saint Helenian Pound - SHP</option>
                          <option value="svc">Salvadoran Colón - SVC</option>
                          <option value="wst">Samoan Tala - WST</option>
                          <option value="sar">Saudi Riyal - SAR</option>
                          <option value="rsd">Serbian Dinar - RSD</option>
                          <option value="scr">Seychellois Rupee - SCR</option>
                          <option value="sll">Sierra Leonean Leone - SLL</option>
                          <option value="xag">Silver (Troy Ounce) - XAG</option>
                          <option value="sgd">Singapore Dollar - SGD</option>
                          <option value="skk">Slovak Koruna - SKK</option>
                          <option value="sbd">Solomon Islands Dollar - SBD</option>
                          <option value="sos">Somali Shilling - SOS</option>
                          <option value="zar">South African Rand - ZAR</option>
                          <option value="krw">South Korean Won - KRW</option>
                          <option value="ssp">South Sudanese Pound - SSP</option>
                          <option value="xdr">Special Drawing Rights - XDR</option>
                          <option value="lkr">Sri Lankan Rupee - LKR</option>
                          <option value="sdg">Sudanese Pound - SDG</option>
                          <option value="srd">Surinamese Dollar - SRD</option>
                          <option value="szl">Swazi Lilangeni - SZL</option>
                          <option value="sek">Swedish Krona - SEK</option>
                          <option value="chf">Swiss Franc - CHF</option>
                          <option value="syp">Syrian Pound - SYP</option>
                          <option value="std">São Tomé and Príncipe Dobra - STD</option>
                          <option value="tjs">Tajikistani Somoni - TJS</option>
                          <option value="tzs">Tanzanian Shilling - TZS</option>
                          <option value="thb">Thai Baht - THB</option>
                          <option value="top">Tongan Paʻanga - TOP</option>
                          <option value="ttd">Trinidad and Tobago Dollar - TTD</option>
                          <option value="tnd">Tunisian Dinar - TND</option>
                          <option value="try">Turkish Lira - TRY</option>
                          <option value="tmm">Turkmenistani Manat - TMM</option>
                          <option value="tmt">Turkmenistani Manat - TMT</option>
                          <option value="xfu">UIC Franc - XFU</option>
                          <option selected="selected" value="ugx">Ugandan Shilling - UGX</option>
                          <option value="uah">Ukrainian Hryvnia - UAH</option>
                          <option value="clf">Unidad de Fomento - CLF</option>
                          <option value="aed">United Arab Emirates Dirham - AED</option>
                          <option value="usd">United States Dollar - USD</option>
                          <option value="uyu">Uruguayan Peso - UYU</option>
                          <option value="uzs">Uzbekistan Som - UZS</option>
                          <option value="vuv">Vanuatu Vatu - VUV</option>
                          <option value="vef">Venezuelan Bolívar - VEF</option>
                          <option value="vnd">Vietnamese Đồng - VND</option>
                          <option value="xof">West African Cfa Franc - XOF</option>
                          <option value="yer">Yemeni Rial - YER</option>
                          <option value="zmk">Zambian Kwacha - ZMK</option>
                          <option value="zmw">Zambian Kwacha - ZMW</option>
                          <option value="zwd">Zimbabwean Dollar - ZWD</option>
                          <option value="zwl">Zimbabwean Dollar - ZWL</option>
                          <option value="zwn">Zimbabwean Dollar - ZWN</option>
                          <option value="zwr">Zimbabwean Dollar - ZWR</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Country</label>
                    <select class="form-control select2 mb-4" name="country">
                        <option value="">Select Country</option>
                        <?php foreach ($countries as $country) { ?>
                            <option value="<?php echo $country['country_code'] ?>"<?php echo isset($institution_detail['country'])&&$institution_detail['country']==$country['country_code']? 'selected':''; ?>><?php echo $country['country_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <!-- Send button -->
                <button id="save_institutions" class="btn btn-info btn-block" type="submit">Save</button>
              </form>
              <!-- Default form contact -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>