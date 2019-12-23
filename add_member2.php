<?php 
  require 'config.php';
?>
<html>

<head>
    <title>เพิมข้อมูลหนังสือรับรอง</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- js -->
    <link rel="stylesheet" href="vendor/select2/css/select2.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

<!-- calendar -->
<link rel="stylesheet" href="vendor\datepicker_buddhist\css\ui-lightness\jquery-ui-1.8.10.custom.css">
<script type="text/javascript" src="vendor\datepicker_buddhist\js\jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="vendor\datepicker_buddhist\js\jquery-ui-1.8.10.offset.datepicker.min.js"></script>

</head>
<?php
function monthThai($strDate)
{
 $strMonth= date("n"); $strMonthCut=Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
 $strMonthThai=$strMonthCut[$strMonth];
 return $strMonthThai ;
}
 ?>
 <script type="text/javascript">
// ป้องกันไม่ให้ jQueryชนกัน 
jq14 = jQuery.noConflict();
jq14(function($) {
    var d = new Date();
    var toDay = d.getDate() + '-' + (d.getMonth() + 1) + '-' + (d.getFullYear() + 543);

    // กรณีต้องการใส่ปฏิทินลงไปมากกว่า 1 อันต่อหน้า ก็ให้มาเพิ่ม Code ที่บรรทัดด้านล่างด้วยครับ (1 ชุด = 1 ปฏิทิน)
    console.log(toDay);
    $("#duetax").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy',
        isBuddhist: true,
        defaultDate: toDay,
        dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
        dayNamesMin: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
        monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม',
            'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
        ],
        monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.',
            'ต.ค.', 'พ.ย.', 'ธ.ค.'
        ]
    });

});
</script>
<style media="screen">
.t-red {
    color: red;
    font-weight: bold;
}

.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    /* text-align: center; */
}

body {
    background-color: #d7d7d7;
}
</style>

<body background="image/bg_member.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <p align="center"><br>
        <br>
        <form name="checkForm" action="?p=action_addMember" method="post" onSubmit="return check()">
            <div class="container">
                <div class="card">
                    <div class="card-header bg-success text-center">
                        <h3 style="color:white">เพิ่มข้อมูล</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="user_name">เลขคัทซี</label>
                                <input type="text" class="form-control  form-control-sm" name="user_name" id="user_name"
                                    value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="address">ยี่ห้อรถ</label>
                                <select name="address" id="address" class="select2 form-control form-control-sm"
                                    onChange="dis(this.value)">
                                    <option value="">------- กรุณาเลือกยี่ห้อรถ -------</option>
                                    <option value="101SAVE">101SAVE</option>
                                    <option value="999MOTOR">999MOTOR</option>
                                    <option value="A.C.">A.C.</option>
                                    <option value="A.J.S.">A.J.S.</option>
                                    <option value="ABBEY">ABBEY</option>
                                    <option value="ABC">ABC</option>
                                    <option value="ABG">ABG</option>
                                    <option value="ABG TITAN">ABG TITAN</option>
                                    <option value="ABG WERKE G.M.B.H.">ABG WERKE G.M.B.H.</option>
                                    <option value="AC">AC</option>
                                    <option value="ACADIAN">ACADIAN</option>
                                    <option value="ACHLEITNER">ACHLEITNER</option>
                                    <option value="ACURA">ACURA</option>
                                    <option value="ADAM">ADAM</option>
                                    <option value="ADDO">ADDO</option>
                                    <option value="ADINO">ADINO</option>
                                    <option value="ADIVA">ADIVA</option>
                                    <option value="ADLEEPOWER">ADLEEPOWER</option>
                                    <option value="ADLER">ADLER</option>
                                    <option value="ADMIRAL">ADMIRAL</option>
                                    <option value="AEOLUS">AEOLUS</option>
                                    <option value="AEON">AEON</option>
                                    <option value="AEQLUS">AEQLUS</option>
                                    <option value="AGCO">AGCO</option>
                                    <option value="AGILTY">AGILTY</option>
                                    <option value="AGRITRUCK">AGRITRUCK</option>
                                    <option value="AGUSTA">AGUSTA</option>
                                    <option value="AHLMANN">AHLMANN</option>
                                    <option value="AIBION-VIKING">AIBION-VIKING</option>
                                    <option value="AICHI">AICHI</option>
                                    <option value="AIRLIAN">AIRLIAN</option>
                                    <option value="AIRMAN">AIRMAN</option>
                                    <option value="AIRSTREAM">AIRSTREAM</option>
                                    <option value="AJ">AJ</option>
                                    <option value="ALABIAN">ALABIAN</option>
                                    <option value="ALFA">ALFA</option>
                                    <option value="ALFA ROMEO">ALFA ROMEO</option>
                                    <option value="ALLARD">ALLARD</option>
                                    <option value="ALLISCHALMERS">ALLISCHALMERS</option>
                                    <option value="ALLISON">ALLISON</option>
                                    <option value="ALLORO">ALLORO</option>
                                    <option value="ALOLUS (AEOLUS)">ALOLUS (AEOLUS)</option>
                                    <option value="ALPHA">ALPHA</option>
                                    <option value="ALPINE">ALPINE</option>
                                    <option value="ALTIMA">ALTIMA</option>
                                    <option value="ALVIS">ALVIS</option>
                                    <option value="AM GENERAL">AM GENERAL</option>
                                    <option value="AMANO">AMANO</option>
                                    <option value="AME">AME</option>
                                    <option value="AMERICAN MOTORS">AMERICAN MOTORS</option>
                                    <option value="AMERICANIRON CHOPPER">AMERICANIRON CHOPPER</option>
                                    <option value="AMILCAR">AMILCAR</option>
                                    <option value="AMMANN">AMMANN</option>
                                    <option value="AMOS">AMOS</option>
                                    <option value="AMP">AMP</option>
                                    <option value="AMPHICAR">AMPHICAR</option>
                                    <option value="AMQ">AMQ</option>
                                    <option value="ANAN">ANAN</option>
                                    <option value="ANTONIO CARRARO">ANTONIO CARRARO</option>
                                    <option value="ANYUAN">ANYUAN</option>
                                    <option value="APAL">APAL</option>
                                    <option value="APILLIA">APILLIA</option>
                                    <option value="APN">APN</option>
                                    <option value="APPRILIA">APPRILIA</option>
                                    <option value="APRILIA">APRILIA</option>
                                    <option value="ARGYLL">ARGYLL</option>
                                    <option value="ARIEL">ARIEL</option>
                                    <option value="ARIEL">ARIEL</option>
                                    <option value="ARKLEY">ARKLEY</option>
                                    <option value="ARLEN-NESS">ARLEN-NESS</option>
                                    <option value="ARMSTRONG">ARMSTRONG</option>
                                    <option value="ARO">ARO</option>
                                    <option value="ARROW">ARROW</option>
                                    <option value="ARROW MASTER">ARROW MASTER</option>
                                    <option value="ASAHI">ASAHI</option>
                                    <option value="ASAKA">ASAKA</option>
                                    <option value="ASANO">ASANO</option>
                                    <option value="ASFALTPAVER">ASFALTPAVER</option>
                                    <option value="ASHOK LEYLAND">ASHOK LEYLAND</option>
                                    <option value="ASIA">ASIA</option>
                                    <option value="ASIACOMBI">ASIACOMBI</option>
                                    <option value="ASIAMORTOR">ASIAMORTOR</option>
                                    <option value="ASOKE">ASOKE</option>
                                    <option value="ASPHALT FINISHER">ASPHALT FINISHER</option>
                                    <option value="ASPPHALT FINISHER">ASPPHALT FINISHER</option>
                                    <option value="ASQUITH">ASQUITH</option>
                                    <option value="ASSY">ASSY</option>
                                    <option value="ASTON MARTIN">ASTON MARTIN</option>
                                    <option value="ASWIN">ASWIN</option>
                                    <option value="ASWIN EDI">ASWIN EDI</option>
                                    <option value="ATEX">ATEX</option>
                                    <option value="ATK">ATK</option>
                                    <option value="ATLANTIS">ATLANTIS</option>
                                    <option value="ATLAS COPCO">ATLAS COPCO</option>
                                    <option value="ATP">ATP</option>
                                    <option value="ATRMAN">ATRMAN</option>
                                    <option value="ATTHAM">ATTHAM</option>
                                    <option value="ATV">ATV</option>
                                    <option value="AUBURN">AUBURN</option>
                                    <option value="AUDI">AUDI</option>
                                    <option value="AULLAN">AULLAN</option>
                                    <option value="AURORA">AURORA</option>
                                    <option value="AUSA">AUSA</option>
                                    <option value="AUSTIN">AUSTIN</option>
                                    <option value="AUSTIN MINI">AUSTIN MINI</option>
                                    <option value="AUSTIN MORRIS">AUSTIN MORRIS</option>
                                    <option value="AUSTIN ROVER">AUSTIN ROVER</option>
                                    <option value="AUSTIN WESTERN">AUSTIN WESTERN</option>
                                    <option value="AUSTIN-HEALEY">AUSTIN-HEALEY</option>
                                    <option value="AUSTOFT">AUSTOFT</option>
                                    <option value="AUTO UNION">AUTO UNION</option>
                                    <option value="AUTOBIANCHI">AUTOBIANCHI</option>
                                    <option value="AUTOCAR">AUTOCAR</option>
                                    <option value="AUTOGARS">AUTOGARS</option>
                                    <option value="AUTOKRAFT">AUTOKRAFT</option>
                                    <option value="AUTOMOBILE">AUTOMOBILE</option>
                                    <option value="AUTOMOTIVE">AUTOMOTIVE</option>
                                    <option value="AVANTI">AVANTI</option>
                                    <option value="AVION VOISIN">AVION VOISIN</option>
                                    <option value="AWO">AWO</option>
                                    <option value="AWS">AWS</option>
                                    <option value="AYMSA">AYMSA</option>
                                    <option value="AZLK">AZLK</option>
                                    <option value="B.S.A.">B.S.A.</option>
                                    <option value="B07">B07</option>
                                    <option value="BACO">BACO</option>
                                    <option value="BAGON">BAGON</option>
                                    <option value="BAILEY">BAILEY</option>
                                    <option value="BAJAJ">BAJAJ</option>
                                    <option value="BAKER">BAKER</option>
                                    <option value="BAMFORDS">BAMFORDS</option>
                                    <option value="BANGKOK PANJAN">BANGKOK PANJAN</option>
                                    <option value="BARBER GREEN">BARBER GREEN</option>
                                    <option value="BARBER GREENE">BARBER GREENE</option>
                                    <option value="BARFORT">BARFORT</option>
                                    <option value="BARONESS">BARONESS</option>
                                    <option value="BAT">BAT</option>
                                    <option value="BE220">BE220</option>
                                    <option value="BEAN">BEAN</option>
                                    <option value="BEANCHI">BEANCHI</option>
                                    <option value="BEB">BEB</option>
                                    <option value="BEC">BEC</option>
                                    <option value="BEDFORD">BEDFORD</option>
                                    <option value="BEETEL">BEETEL</option>
                                    <option value="BEIBEN">BEIBEN</option>
                                    <option value="BEIJING">BEIJING</option>
                                    <option value="BELARUS">BELARUS</option>
                                    <option value="BELL">BELL</option>
                                    <option value="BEML">BEML</option>
                                    <option value="BENEDETTI">BENEDETTI</option>
                                    <option value="BENELLI">BENELLI</option>
                                    <option value="BENFORD">BENFORD</option>
                                    <option value="BENTLEY">BENTLEY</option>
                                    <option value="BENYE">BENYE</option>
                                    <option value="BENZ">BENZ</option>
                                    <option value="BENZHOU">BENZHOU</option>
                                    <option value="BERGKAMP">BERGKAMP</option>
                                    <option value="BEST RUN">BEST RUN</option>
                                    <option value="BESTRUN">BESTRUN</option>
                                    <option value="BETA">BETA</option>
                                    <option value="BGP">BGP</option>
                                    <option value="BIG DOG">BIG DOG</option>
                                    <option value="BIG DOG PIT BULL">BIG DOG PIT BULL</option>
                                    <option value="BIGBULL">BIGBULL</option>
                                    <option value="BIMOTA">BIMOTA</option>
                                    <option value="BIOTA">BIOTA</option>
                                    <option value="BIRMINGHAM">BIRMINGHAM</option>
                                    <option value="BITELLI">BITELLI</option>
                                    <option value="BITTLLI">BITTLLI</option>
                                    <option value="BLAW KNOX">BLAW KNOX</option>
                                    <option value="BLAW KNOX BK95">BLAW KNOX BK95</option>
                                    <option value="BLUEBIRD">BLUEBIRD</option>
                                    <option value="BMC">BMC</option>
                                    <option value="BMW">BMW</option>
                                    <option value="BMW MINI">BMW MINI</option>
                                    <option value="BMW MINI ONE">BMW MINI ONE</option>
                                    <option value="BMW MINICOOPER">BMW MINICOOPER</option>
                                    <option value="BMW MINICOOPER S">BMW MINICOOPER S</option>
                                    <option value="BOALI">BOALI</option>
                                    <option value="BOBBER">BOBBER</option>
                                    <option value="BOBCAT">BOBCAT</option>
                                    <option value="BOMAG">BOMAG</option>
                                    <option value="BOMAX">BOMAX</option>
                                    <option value="BOMBADISE">BOMBADISE</option>
                                    <option value="BONLUCK">BONLUCK</option>
                                    <option value="BORGWARD">BORGWARD</option>
                                    <option value="BOSS">BOSS</option>
                                    <option value="BOSS HOSS">BOSS HOSS</option>
                                    <option value="BOURGETLOWBLOW">BOURGETLOWBLOW</option>
                                    <option value="BOURGETPYTHON">BOURGETPYTHON</option>
                                    <option value="BOXER">BOXER</option>
                                    <option value="BPI">BPI</option>
                                    <option value="BRADLEY">BRADLEY</option>
                                    <option value="BRANSON">BRANSON</option>
                                    <option value="BRASTOFT">BRASTOFT</option>
                                    <option value="BRAVO-85">BRAVO-85</option>
                                    <option value="BRAY">BRAY</option>
                                    <option value="BRENDERUP">BRENDERUP</option>
                                    <option value="BRICKLIN">BRICKLIN</option>
                                    <option value="BRIDGESTONE">BRIDGESTONE</option>
                                    <option value="BRILLIANCE">BRILLIANCE</option>
                                    <option value="BRISTOL">BRISTOL</option>
                                    <option value="BRISTOL">BRISTOL</option>
                                    <option value="BRN_DESC">BRN_DESC</option>
                                    <option value="BRODERSON">BRODERSON</option>
                                    <option value="BROOKLIN">BROOKLIN</option>
                                    <option value="BROS">BROS</option>
                                    <option value="BRP">BRP</option>
                                    <option value="BSA">BSA</option>
                                    <option value="BUBU">BUBU</option>
                                    <option value="BUCHER">BUCHER</option>
                                    <option value="BUELL">BUELL</option>
                                    <option value="BUELL ULYSSES">BUELL ULYSSES</option>
                                    <option value="BUFORI">BUFORI</option>
                                    <option value="BUFORT">BUFORT</option>
                                    <option value="BUGATTI">BUGATTI</option>
                                    <option value="BUGGIE">BUGGIE</option>
                                    <option value="BUICK">BUICK</option>
                                    <option value="BULLDOZER">BULLDOZER</option>
                                    <option value="BULLET">BULLET</option>
                                    <option value="BULTACO">BULTACO</option>
                                    <option value="BURTONE">BURTONE</option>
                                    <option value="BUSSING">BUSSING</option>
                                    <option value="BYD">BYD</option>
                                    <option value="C-FEE">C-FEE</option>
                                    <option value="C.F.P.M.">C.F.P.M.</option>
                                    <option value="C.M.C">C.M.C</option>
                                    <option value="CADILLAC">CADILLAC</option>
                                    <option value="CAGIVA">CAGIVA</option>
                                    <option value="CALLILATER">CALLILATER</option>
                                    <option value="CAMC">CAMC</option>
                                    <option value="CAMECO">CAMECO</option>
                                    <option value="CAN-AM">CAN-AM</option>
                                    <option value="CANCIL">CANCIL</option>
                                    <option value="CANTER">CANTER</option>
                                    <option value="CANYCOM">CANYCOM</option>
                                    <option value="CARGO">CARGO</option>
                                    <option value="CARRIER">CARRIER</option>
                                    <option value="CASDROF">CASDROF</option>
                                    <option value="CASE">CASE</option>
                                    <option value="CASE CE">CASE CE</option>
                                    <option value="CASE IH">CASE IH</option>
                                    <option value="CASEBRASTOF">CASEBRASTOF</option>
                                    <option value="CASES">CASES</option>
                                    <option value="CAT">CAT</option>
                                    <option value="CAT BULLDOZER">CAT BULLDOZER</option>
                                    <option value="CAT-MITSUBISHI">CAT-MITSUBISHI</option>
                                    <option value="CATERHAM">CATERHAM</option>
                                    <option value="CATERHAM CAR">CATERHAM CAR</option>
                                    <option value="CATERPILLAR">CATERPILLAR</option>
                                    <option value="CATS">CATS</option>
                                    <option value="CATTERPILLAR">CATTERPILLAR</option>
                                    <option value="CATZ">CATZ</option>
                                    <option value="CCMG">CCMG</option>
                                    <option value="CEAGLAVE">CEAGLAVE</option>
                                    <option value="CEDARAPIDS">CEDARAPIDS</option>
                                    <option value="CEDARRAPIDS">CEDARRAPIDS</option>
                                    <option value="CENTAUR">CENTAUR</option>
                                    <option value="CFL RIGID">CFL RIGID</option>
                                    <option value="CG">CG</option>
                                    <option value="CHAAM">CHAAM</option>
                                    <option value="CHAI">CHAI</option>
                                    <option value="CHAISERI">CHAISERI</option>
                                    <option value="CHAIYO">CHAIYO</option>
                                    <option value="CHAMP">CHAMP</option>
                                    <option value="CHAMPION">CHAMPION</option>
                                    <option value="CHANA">CHANA</option>
                                    <option value="CHANG AN">CHANG AN</option>
                                    <option value="CHANG JIANG">CHANG JIANG</option>
                                    <option value="CHANG TONG">CHANG TONG</option>
                                    <option value="CHANGAN">CHANGAN</option>
                                    <option value="CHANGFA">CHANGFA</option>
                                    <option value="CHANGHE">CHANGHE</option>
                                    <option value="CHANGLIN">CHANGLIN</option>
                                    <option value="CHAVDAR">CHAVDAR</option>
                                    <option value="CHEAD CHAI">CHEAD CHAI</option>
                                    <option value="CHECKER">CHECKER</option>
                                    <option value="CHEETAH">CHEETAH</option>
                                    <option value="CHEKALBAYER">CHEKALBAYER</option>
                                    <option value="CHEN YU">CHEN YU</option>
                                    <option value="CHENARD & WALCKER">CHENARD & WALCKER</option>
                                    <option value="CHENGGONG">CHENGGONG</option>
                                    <option value="CHENGGONG">CHENGGONG</option>
                                    <option value="CHEPPEL">CHEPPEL</option>
                                    <option value="CHERDCHAI">CHERDCHAI</option>
                                    <option value="CHEROKEE">CHEROKEE</option>
                                    <option value="CHERRINGTON">CHERRINGTON</option>
                                    <option value="CHERY">CHERY</option>
                                    <option value="CHEVROLET">CHEVROLET</option>
                                    <option value="CHEVWEVAN">CHEVWEVAN</option>
                                    <option value="CHIKUSHI">CHIKUSHI</option>
                                    <option value="CHIKUSUI">CHIKUSUI</option>
                                    <option value="CHIKUSUI CANYCOM">CHIKUSUI CANYCOM</option>
                                    <option value="CHINA">CHINA</option>
                                    <option value="CHINNARAJE">CHINNARAJE</option>
                                    <option value="CHL">CHL</option>
                                    <option value="CHONGQING">CHONGQING</option>
                                    <option value="CHRYSLER">CHRYSLER</option>
                                    <option value="CHRYSLER JEEP">CHRYSLER JEEP</option>
                                    <option value="CHRYSLER VOYAGER">CHRYSLER VOYAGER</option>
                                    <option value="CHRYSLER WRANGLER">CHRYSLER WRANGLER</option>
                                    <option value="CIFA">CIFA</option>
                                    <option value="CIMC">CIMC</option>
                                    <option value="CISITALIA">CISITALIA</option>
                                    <option value="CITROEN">CITROEN</option>
                                    <option value="CIVICA">CIVICA</option>
                                    <option value="CIZETA">CIZETA</option>
                                    <option value="CLAAS">CLAAS</option>
                                    <option value="CLAN">CLAN</option>
                                    <option value="CLARK">CLARK</option>
                                    <option value="CLARK MICHICAN">CLARK MICHICAN</option>
                                    <option value="CLARKNICHIGAN">CLARKNICHIGAN</option>
                                    <option value="CLEMENT">CLEMENT</option>
                                    <option value="CLIMAX">CLIMAX</option>
                                    <option value="CLYNO">CLYNO</option>
                                    <option value="CMCL">CMCL</option>
                                    <option value="CMEC">CMEC</option>
                                    <option value="CMI">CMI</option>
                                    <option value="CNC">CNC</option>
                                    <option value="CNG">CNG</option>
                                    <option value="CNH">CNH</option>
                                    <option value="CNHTC">CNHTC</option>
                                    <option value="COCATY">COCATY</option>
                                    <option value="COLD">COLD</option>
                                    <option value="COLES">COLES</option>
                                    <option value="COLT">COLT</option>
                                    <option value="COMBAYS">COMBAYS</option>
                                    <option value="COMBI">COMBI</option>
                                    <option value="COMMER">COMMER</option>
                                    <option value="COMMINS">COMMINS</option>
                                    <option value="COMPACTOR">COMPACTOR</option>
                                    <option value="COMPAIR HOLMAN">COMPAIR HOLMAN</option>
                                    <option value="COMPARE HOLMAN">COMPARE HOLMAN</option>
                                    <option value="COMPATTER">COMPATTER</option>
                                    <option value="CONCEPT">CONCEPT</option>
                                    <option value="CONFEDERATE">CONFEDERATE</option>
                                    <option value="CONY">CONY</option>
                                    <option value="COOPER">COOPER</option>
                                    <option value="COOPER MINI">COOPER MINI</option>
                                    <option value="CORD">CORD</option>
                                    <option value="CORVETTE">CORVETTE</option>
                                    <option value="COSMO">COSMO</option>
                                    <option value="COTA">COTA</option>
                                    <option value="COUNTY">COUNTY</option>
                                    <option value="CPI">CPI</option>
                                    <option value="CRETANO">CRETANO</option>
                                    <option value="CROSLEY">CROSLEY</option>
                                    <option value="CROSSLEY">CROSSLEY</option>
                                    <option value="CROWN">CROWN</option>
                                    <option value="CUKUROVA">CUKUROVA</option>
                                    <option value="CUMMIAS">CUMMIAS</option>
                                    <option value="CUMMINS">CUMMINS</option>
                                    <option value="CUSTOKA">CUSTOKA</option>
                                    <option value="CY">CY</option>
                                    <option value="CYBER">CYBER</option>
                                    <option value="DACIA">DACIA</option>
                                    <option value="DADONG">DADONG</option>
                                    <option value="DAEDONG">DAEDONG</option>
                                    <option value="DAELIM">DAELIM</option>
                                    <option value="DAEWOO">DAEWOO</option>
                                    <option value="DAF">DAF</option>
                                    <option value="DAGON">DAGON</option>
                                    <option value="DAI-O">DAI-O</option>
                                    <option value="DAIHATSU">DAIHATSU</option>
                                    <option value="DAIMLER">DAIMLER</option>
                                    <option value="DAIWA">DAIWA</option>
                                    <option value="DAIYA">DAIYA</option>
                                    <option value="DALIAN">DALIAN</option>
                                    <option value="DANGEL">DANGEL</option>
                                    <option value="DARRACQ">DARRACQ</option>
                                    <option value="DATSUN">DATSUN</option>
                                    <option value="DAVID BROWN">DAVID BROWN</option>
                                    <option value="DAVRIAN">DAVRIAN</option>
                                    <option value="DAYANG">DAYANG</option>
                                    <option value="DAYTONA">DAYTONA</option>
                                    <option value="DAYUN">DAYUN</option>
                                    <option value="DE COURVILLE">DE COURVILLE</option>
                                    <option value="DE DIETRICH">DE DIETRICH</option>
                                    <option value="DE DION">DE DION</option>
                                    <option value="DE TOMASO">DE TOMASO</option>
                                    <option value="DEBA">DEBA</option>
                                    <option value="DECAUVILLE">DECAUVILLE</option>
                                    <option value="DEER MASTER">DEER MASTER</option>
                                    <option value="DELAGE">DELAGE</option>
                                    <option value="DELAHAYE">DELAHAYE</option>
                                    <option value="DELAUNAY-BELLEYILLE">DELAUNAY-BELLEYILLE</option>
                                    <option value="DELICA">DELICA</option>
                                    <option value="DELKRON">DELKRON</option>
                                    <option value="DELOREAN">DELOREAN</option>
                                    <option value="DEMAG">DEMAG</option>
                                    <option value="DENNIS">DENNIS</option>
                                    <option value="DENWAY">DENWAY</option>
                                    <option value="DENYO">DENYO</option>
                                    <option value="DERBI">DERBI</option>
                                    <option value="DERBY">DERBY</option>
                                    <option value="DERIKA">DERIKA</option>
                                    <option value="DESANDE">DESANDE</option>
                                    <option value="DESOTO">DESOTO</option>
                                    <option value="DETAS">DETAS</option>
                                    <option value="DETROIT">DETROIT</option>
                                    <option value="DEUS">DEUS</option>
                                    <option value="DEUTZ">DEUTZ</option>
                                    <option value="DEUTZ FAHR">DEUTZ FAHR</option>
                                    <option value="DEVA">DEVA</option>
                                    <option value="DFM">DFM</option>
                                    <option value="DFMDONG FENG">DFMDONG FENG</option>
                                    <option value="DFP">DFP</option>
                                    <option value="DFSK">DFSK</option>
                                    <option value="DHI">DHI</option>
                                    <option value="DIAMOND">DIAMOND</option>
                                    <option value="DIATTO">DIATTO</option>
                                    <option value="DINLI">DINLI</option>
                                    <option value="DIPER">DIPER</option>
                                    <option value="DISCOVERY">DISCOVERY</option>
                                    <option value="DISTAR">DISTAR</option>
                                    <option value="DITCH WITCH">DITCH WITCH</option>
                                    <option value="DJSTAR">DJSTAR</option>
                                    <option value="DKW">DKW</option>
                                    <option value="DMC">DMC</option>
                                    <option value="DNEPR">DNEPR</option>
                                    <option value="DODGE">DODGE</option>
                                    <option value="DODGERAM">DODGERAM</option>
                                    <option value="DOK">DOK</option>
                                    <option value="DOMINO">DOMINO</option>
                                    <option value="DONG FANG HONG">DONG FANG HONG</option>
                                    <option value="DONGFENG">DONGFENG</option>
                                    <option value="DONGFENG">DONGFENG</option>
                                    <option value="DONGSENG">DONGSENG</option>
                                    <option value="DONGYU">DONGYU</option>
                                    <option value="DONKER VOORT">DONKER VOORT</option>
                                    <option value="DOOSAN">DOOSAN</option>
                                    <option value="DOOSAN DAEWOO">DOOSAN DAEWOO</option>
                                    <option value="DOSEY">DOSEY</option>
                                    <option value="DOUZ">DOUZ</option>
                                    <option value="DRA">DRA</option>
                                    <option value="DRAGON">DRAGON</option>
                                    <option value="DRESSER">DRESSER</option>
                                    <option value="DRESSTA">DRESSTA</option>
                                    <option value="DRILLTO">DRILLTO</option>
                                    <option value="DROTT">DROTT</option>
                                    <option value="DUCATI">DUCATI</option>
                                    <option value="DUESENBERG">DUESENBERG</option>
                                    <option value="DUKAPY">DUKAPY</option>
                                    <option value="DUNKLEY">DUNKLEY</option>
                                    <option value="DURAMAX">DURAMAX</option>
                                    <option value="DURYEA">DURYEA</option>
                                    <option value="DUTTON">DUTTON</option>
                                    <option value="DYMAG">DYMAG</option>
                                    <option value="DYNAPAC">DYNAPAC</option>
                                    <option value="DYNAPAC WATANABE">DYNAPAC WATANABE</option>
                                    <option value="DYNAPAC-HITACHI">DYNAPAC-HITACHI</option>
                                    <option value="DYNAPACK">DYNAPACK</option>
                                    <option value="E-BIKE">E-BIKE</option>
                                    <option value="E-MAX">E-MAX</option>
                                    <option value="E.M.EAGLE">E.M.EAGLE</option>
                                    <option value="EAGLE">EAGLE</option>
                                    <option value="EASY CRUISET">EASY CRUISET</option>
                                    <option value="EBRO">EBRO</option>
                                    <option value="ECOBIKE">ECOBIKE</option>
                                    <option value="ECOBRAND">ECOBRAND</option>
                                    <option value="EDER">EDER</option>
                                    <option value="EDSEL">EDSEL</option>
                                    <option value="EL NASR">EL NASR</option>
                                    <option value="ELDDIS">ELDDIS</option>
                                    <option value="ELECTA">ELECTA</option>
                                    <option value="ELECTRON">ELECTRON</option>
                                    <option value="ELGIN">ELGIN</option>
                                    <option value="ELVA">ELVA</option>
                                    <option value="EMERGENCY">EMERGENCY</option>
                                    <option value="ENFIELD">ENFIELD</option>
                                    <option value="ENFLY">ENFLY</option>
                                    <option value="ENGLE">ENGLE</option>
                                    <option value="ENVEMO">ENVEMO</option>
                                    <option value="ERA">ERA</option>
                                    <option value="ERA JINBEI">ERA JINBEI</option>
                                    <option value="ERAY">ERAY</option>
                                    <option value="ERF EC11">ERF EC11</option>
                                    <option value="ESAKI">ESAKI</option>
                                    <option value="ESTAELLA">ESTAELLA</option>
                                    <option value="ETAN4U">ETAN4U</option>
                                    <option value="ETCA">ETCA</option>
                                    <option value="EURODRIVE">EURODRIVE</option>
                                    <option value="EUROMACH">EUROMACH</option>
                                    <option value="EUROPARD">EUROPARD</option>
                                    <option value="EUROTRAC">EUROTRAC</option>
                                    <option value="EVELING BARFORD">EVELING BARFORD</option>
                                    <option value="EVERDIGM">EVERDIGM</option>
                                    <option value="EVT">EVT</option>
                                    <option value="EXCALIBUR">EXCALIBUR</option>
                                    <option value="EXCAVATOR">EXCAVATOR</option>
                                    <option value="EXCELSIOR">EXCELSIOR</option>
                                    <option value="EXPERTISE">EXPERTISE</option>
                                    <option value="EXTEC">EXTEC</option>
                                    <option value="EYNYRE">EYNYRE</option>
                                    <option value="FACEL VEGA">FACEL VEGA</option>
                                    <option value="FAI">FAI</option>
                                    <option value="FAIRLADY">FAIRLADY</option>
                                    <option value="FAIRTHORPE">FAIRTHORPE</option>
                                    <option value="FANTASY">FANTASY</option>
                                    <option value="FANTIC">FANTIC</option>
                                    <option value="FANTIC RACING">FANTIC RACING</option>
                                    <option value="FANTICMOTO">FANTICMOTO</option>
                                    <option value="FANTUZZI">FANTUZZI</option>
                                    <option value="FARBIO">FARBIO</option>
                                    <option value="FARGO">FARGO</option>
                                    <option value="FARM MAC">FARM MAC</option>
                                    <option value="FARMASTER">FARMASTER</option>
                                    <option value="FARMER">FARMER</option>
                                    <option value="FARMTRAC">FARMTRAC</option>
                                    <option value="FARUS">FARUS</option>
                                    <option value="FASA">FASA</option>
                                    <option value="FAUN">FAUN</option>
                                    <option value="FAW">FAW</option>
                                    <option value="FAW RENAULT">FAW RENAULT</option>
                                    <option value="FC">FC</option>
                                    <option value="FEENIC">FEENIC</option>
                                    <option value="FENDT">FENDT</option>
                                    <option value="FERGUS">FERGUS</option>
                                    <option value="FERMEC">FERMEC</option>
                                    <option value="FERRARI">FERRARI</option>
                                    <option value="FIAT">FIAT</option>
                                    <option value="FIAT ALLIS">FIAT ALLIS</option>
                                    <option value="FIATAGRI">FIATAGRI</option>
                                    <option value="FIBERFAB">FIBERFAB</option>
                                    <option value="FIKARO">FIKARO</option>
                                    <option value="FINBRO">FINBRO</option>
                                    <option value="FN">FN</option>
                                    <option value="FNM">FNM</option>
                                    <option value="FOCANE">FOCANE</option>
                                    <option value="FODAY">FODAY</option>
                                    <option value="FODEN">FODEN</option>
                                    <option value="FODIN">FODIN</option>
                                    <option value="FONTAINE">FONTAINE</option>
                                    <option value="FORCHE">FORCHE</option>
                                    <option value="FORD">FORD</option>
                                    <option value="FORD JOHNTON">FORD JOHNTON</option>
                                    <option value="FORD-NEWHOLLAND">FORD-NEWHOLLAND</option>
                                    <option value="FORD/MAZDA">FORD/MAZDA</option>
                                    <option value="FOREDIL">FOREDIL</option>
                                    <option value="FOREMOST">FOREMOST</option>
                                    <option value="FORWAY">FORWAY</option>
                                    <option value="FOTON">FOTON</option>
                                    <option value="FOTON LOVOL">FOTON LOVOL</option>
                                    <option value="FRANCE LOADER">FRANCE LOADER</option>
                                    <option value="FRANKLIN">FRANKLIN</option>
                                    <option value="FRASTE">FRASTE</option>
                                    <option value="FRAZER NASH">FRAZER NASH</option>
                                    <option value="FREELANDER">FREELANDER</option>
                                    <option value="FREIGHTLINER">FREIGHTLINER</option>
                                    <option value="FRUEHAUF">FRUEHAUF</option>
                                    <option value="FRUHOFF">FRUHOFF</option>
                                    <option value="FSO">FSO</option>
                                    <option value="FUCHS">FUCHS</option>
                                    <option value="FUERXIN">FUERXIN</option>
                                    <option value="FUJI">FUJI</option>
                                    <option value="FUJI RABBIT">FUJI RABBIT</option>
                                    <option value="FUJINO">FUJINO</option>
                                    <option value="FUJISAWA">FUJISAWA</option>
                                    <option value="FURUDAWA">FURUDAWA</option>
                                    <option value="FURUKAWA">FURUKAWA</option>
                                    <option value="FUSO">FUSO</option>
                                    <option value="FUWA">FUWA</option>
                                    <option value="FYM">FYM</option>
                                    <option value="G DRAGON MOTOR">G DRAGON MOTOR</option>
                                    <option value="G.M.C.">G.M.C.</option>
                                    <option value="G.T.M.">G.T.M.</option>
                                    <option value="GAGIVA">GAGIVA</option>
                                    <option value="GALERA">GALERA</option>
                                    <option value="GALION">GALION</option>
                                    <option value="GALLINA">GALLINA</option>
                                    <option value="GARDIATOR">GARDIATOR</option>
                                    <option value="GARDNER DENVER">GARDNER DENVER</option>
                                    <option value="GARUDA">GARUDA</option>
                                    <option value="GAS GAS">GAS GAS</option>
                                    <option value="GAZ">GAZ</option>
                                    <option value="GEELY">GEELY</option>
                                    <option value="GEHL">GEHL</option>
                                    <option value="GENIE">GENIE</option>
                                    <option value="GEO">GEO</option>
                                    <option value="GIANNINI">GIANNINI</option>
                                    <option value="GIANT">GIANT</option>
                                    <option value="GILBERN">GILBERN</option>
                                    <option value="GILERA">GILERA</option>
                                    <option value="GINETTA">GINETTA</option>
                                    <option value="GLADIATOR">GLADIATOR</option>
                                    <option value="GLAS">GLAS</option>
                                    <option value="GLASSIC">GLASSIC</option>
                                    <option value="GLOBE">GLOBE</option>
                                    <option value="GM">GM</option>
                                    <option value="GM.PH">GM.PH</option>
                                    <option value="GMC">GMC</option>
                                    <option value="GOBRON-BRILLIE">GOBRON-BRILLIE</option>
                                    <option value="GOLD STAR">GOLD STAR</option>
                                    <option value="GOLDEN BOW">GOLDEN BOW</option>
                                    <option value="GOLDEN DRAGON">GOLDEN DRAGON</option>
                                    <option value="GOLDEN POWER">GOLDEN POWER</option>
                                    <option value="GOLDHOFER">GOLDHOFER</option>
                                    <option value="GOLF">GOLF</option>
                                    <option value="GOMACO">GOMACO</option>
                                    <option value="GOOD TIMES">GOOD TIMES</option>
                                    <option value="GOODSENSE">GOODSENSE</option>
                                    <option value="GORDON-KEEBLE">GORDON-KEEBLE</option>
                                    <option value="GP">GP</option>
                                    <option value="GPX">GPX</option>
                                    <option value="GRADALL">GRADALL</option>
                                    <option value="GRADER">GRADER</option>
                                    <option value="GRAF UND STIFT">GRAF UND STIFT</option>
                                    <option value="GRAHAM-PAIGE">GRAHAM-PAIGE</option>
                                    <option value="GRAND CHEROKEE">GRAND CHEROKEE</option>
                                    <option value="GRANDIN">GRANDIN</option>
                                    <option value="GRANTON">GRANTON</option>
                                    <option value="GRAYHOUND">GRAYHOUND</option>
                                    <option value="GREAT WALL">GREAT WALL</option>
                                    <option value="GREEN MACHINE">GREEN MACHINE</option>
                                    <option value="GREEN MOTOR">GREEN MOTOR</option>
                                    <option value="GREEN PEAK">GREEN PEAK</option>
                                    <option value="GREENBIKE">GREENBIKE</option>
                                    <option value="GREGOIRE">GREGOIRE</option>
                                    <option value="GREMLIN">GREMLIN</option>
                                    <option value="GROVE">GROVE</option>
                                    <option value="GUANGXI YUCHAI">GUANGXI YUCHAI</option>
                                    <option value="GUANGZHOU">GUANGZHOU</option>
                                    <option value="GUANHAO">GUANHAO</option>
                                    <option value="GUIZZO">GUIZZO</option>
                                    <option value="GURGEL">GURGEL</option>
                                    <option value="GUSTO">GUSTO</option>
                                    <option value="GUY">GUY</option>
                                    <option value="GWHEEL-TMNOGW">GWHEEL-TMNOGW</option>
                                    <option value="GWK">GWK</option>
                                    <option value="GYSUNG">GYSUNG</option>
                                    <option value="H.C.">H.C.</option>
                                    <option value="HAIDE">HAIDE</option>
                                    <option value="HAIHONG">HAIHONG</option>
                                    <option value="HALA">HALA</option>
                                    <option value="HALLA">HALLA</option>
                                    <option value="HAMELN WESER">HAMELN WESER</option>
                                    <option value="HAMM">HAMM</option>
                                    <option value="HAMPTON">HAMPTON</option>
                                    <option value="HANDS">HANDS</option>
                                    <option value="HANIS">HANIS</option>
                                    <option value="HANIX">HANIX</option>
                                    <option value="HANIX S$B">HANIX S$B</option>
                                    <option value="HANNEX">HANNEX</option>
                                    <option value="HANOMAG">HANOMAG</option>
                                    <option value="HANSA-LLOYD">HANSA-LLOYD</option>
                                    <option value="HANTA">HANTA</option>
                                    <option value="HAOREN">HAOREN</option>
                                    <option value="HARDE">HARDE</option>
                                    <option value="HARFRINGER">HARFRINGER</option>
                                    <option value="HARLEY">HARLEY</option>
                                    <option value="HARLEY DAVIDSON">HARLEY DAVIDSON</option>
                                    <option value="HARLEY LIFAN">HARLEY LIFAN</option>
                                    <option value="HARVESTOR MACNINE">HARVESTOR MACNINE</option>
                                    <option value="HAULOTTE">HAULOTTE</option>
                                    <option value="HAYAKU">HAYAKU</option>
                                    <option value="HAYASAKI">HAYASAKI</option>
                                    <option value="HAYAZAKI">HAYAZAKI</option>
                                    <option value="HEARTLAND">HEARTLAND</option>
                                    <option value="HECHA">HECHA</option>
                                    <option value="HEINKEL">HEINKEL</option>
                                    <option value="HELI">HELI</option>
                                    <option value="HENGTONG">HENGTONG</option>
                                    <option value="HERCULIS">HERCULIS</option>
                                    <option value="HERO">HERO</option>
                                    <option value="HERO HONDA">HERO HONDA</option>
                                    <option value="HESSEGARAGE">HESSEGARAGE</option>
                                    <option value="HIDROMEK">HIDROMEK</option>
                                    <option value="HIGATA">HIGATA</option>
                                    <option value="HIGER">HIGER</option>
                                    <option value="HILLMAN">HILLMAN</option>
                                    <option value="HILUNG">HILUNG</option>
                                    <option value="HINDUSTAN">HINDUSTAN</option>
                                    <option value="HINO" selected>HINO</option>
                                    <option value="HINOMOTO">HINOMOTO</option>
                                    <option value="HINOTA">HINOTA</option>
                                    <option value="HIROSHI">HIROSHI</option>
                                    <option value="HISPANO-SUIZA">HISPANO-SUIZA</option>
                                    <option value="HITACHI">HITACHI</option>
                                    <option value="HITACHI DYNAPAC">HITACHI DYNAPAC</option>
                                    <option value="HITACHI SUMITOMO">HITACHI SUMITOMO</option>
                                    <option value="HKMCO">HKMCO</option>
                                    <option value="HKS">HKS</option>
                                    <option value="HM MOTO">HM MOTO</option>
                                    <option value="HNU">HNU</option>
                                    <option value="HOKKAI FORD">HOKKAI FORD</option>
                                    <option value="HOKUETSU">HOKUETSU</option>
                                    <option value="HOKUTO">HOKUTO</option>
                                    <option value="HOKUTO KENKI">HOKUTO KENKI</option>
                                    <option value="HOLDEN">HOLDEN</option>
                                    <option value="HONDA">HONDA</option>
                                    <option value="HONG QI">HONG QI</option>
                                    <option value="HORCH">HORCH</option>
                                    <option value="HOREX">HOREX</option>
                                    <option value="HORSTMANN">HORSTMANN</option>
                                    <option value="HOTCHKISS">HOTCHKISS</option>
                                    <option value="HOVER">HOVER</option>
                                    <option value="HOWA">HOWA</option>
                                    <option value="HOWO">HOWO</option>
                                    <option value="HRG">HRG</option>
                                    <option value="HRT4">HRT4</option>
                                    <option value="HUA-XING">HUA-XING</option>
                                    <option value="HUAIHAI">HUAIHAI</option>
                                    <option value="HUANAN">HUANAN</option>
                                    <option value="HUASHA">HUASHA</option>
                                    <option value="HUBEI">HUBEI</option>
                                    <option value="HUDSON">HUDSON</option>
                                    <option value="HUMBER">HUMBER</option>
                                    <option value="HUMMER">HUMMER</option>
                                    <option value="HUNTER">HUNTER</option>
                                    <option value="HUPMOBILE">HUPMOBILE</option>
                                    <option value="HUSABERG">HUSABERG</option>
                                    <option value="HUSGVARNA">HUSGVARNA</option>
                                    <option value="HUSQVARNA">HUSQVARNA</option>
                                    <option value="HUSQVARNAS">HUSQVARNAS</option>
                                    <option value="HUTSON">HUTSON</option>
                                    <option value="HYOSUNG">HYOSUNG</option>
                                    <option value="HYPAC">HYPAC</option>
                                    <option value="HYSTER">HYSTER</option>
                                    <option value="HYUNDAI">HYUNDAI</option>
                                    <option value="I.H.C">I.H.C</option>
                                    <option value="I.H.I.">I.H.I.</option>
                                    <option value="IDEAS MACHINE">IDEAS MACHINE</option>
                                    <option value="IHI">IHI</option>
                                    <option value="IHI IS">IHI IS</option>
                                    <option value="IKA">IKA</option>
                                    <option value="IKARUS">IKARUS</option>
                                    <option value="IMASUMA">IMASUMA</option>
                                    <option value="IMPERIA">IMPERIA</option>
                                    <option value="IMPERIAL">IMPERIAL</option>
                                    <option value="INDIAN">INDIAN</option>
                                    <option value="INFINITI">INFINITI</option>
                                    <option value="INGERSOLL-RAND">INGERSOLL-RAND</option>
                                    <option value="INNOCENTI">INNOCENTI</option>
                                    <option value="INTER">INTER</option>
                                    <option value="INTER TYMCO">INTER TYMCO</option>
                                    <option value="INTERDUMMIN">INTERDUMMIN</option>
                                    <option value="INTERMECCANICA">INTERMECCANICA</option>
                                    <option value="INTERNASIONAL">INTERNASIONAL</option>
                                    <option value="INTERNATIONAL">INTERNATIONAL</option>
                                    <option value="INTERSSCUNT">INTERSSCUNT</option>
                                    <option value="INVICTA">INVICTA</option>
                                    <option value="IR ABG">IR ABG</option>
                                    <option value="ISAKI">ISAKI</option>
                                    <option value="ISEKI">ISEKI</option>
                                    <option value="ISETTA">ISETTA</option>
                                    <option value="ISHIKAWAJIMA">ISHIKAWAJIMA</option>
                                    <option value="ISHIKO">ISHIKO</option>
                                    <option value="ISO">ISO</option>
                                    <option value="ISOTTA FRASCHINI">ISOTTA FRASCHINI</option>
                                    <option value="ISUZU">ISUZU</option>
                                    <option value="ISUZU GIGA">ISUZU GIGA</option>
                                    <option value="ITALA">ITALA</option>
                                    <option value="ITALJET">ITALJET</option>
                                    <option value="ITD">ITD</option>
                                    <option value="IVECO">IVECO</option>
                                    <option value="IWAFUJI">IWAFUJI</option>
                                    <option value="IWATAFUJI">IWATAFUJI</option>
                                    <option value="IWATEFUJI">IWATEFUJI</option>
                                    <option value="IWL">IWL</option>
                                    <option value="IZA">IZA</option>
                                    <option value="IZH">IZH</option>
                                    <option value="J.DAI">J.DAI</option>
                                    <option value="JAC">JAC</option>
                                    <option value="JACMAT">JACMAT</option>
                                    <option value="JACOBSEN">JACOBSEN</option>
                                    <option value="JAGUAR">JAGUAR</option>
                                    <option value="JAIPET">JAIPET</option>
                                    <option value="JAKAI">JAKAI</option>
                                    <option value="JANSSEN">JANSSEN</option>
                                    <option value="JAPAN NIKKU">JAPAN NIKKU</option>
                                    <option value="JAPAN STEEL WORKS">JAPAN STEEL WORKS</option>
                                    <option value="JAPANIC">JAPANIC</option>
                                    <option value="JASPER">JASPER</option>
                                    <option value="JASPER">JASPER</option>
                                    <option value="JAVAN">JAVAN</option>
                                    <option value="JAVELIN">JAVELIN</option>
                                    <option value="JAWA">JAWA</option>
                                    <option value="JBC">JBC</option>
                                    <option value="JCB">JCB</option>
                                    <option value="JCB VIBROMAX">JCB VIBROMAX</option>
                                    <option value="JD">JD</option>
                                    <option value="JEEP">JEEP</option>
                                    <option value="JEEP CHAVROLET">JEEP CHAVROLET</option>
                                    <option value="JEEP CHEROKEE">JEEP CHEROKEE</option>
                                    <option value="JEEP CHRYSLER">JEEP CHRYSLER</option>
                                    <option value="JEEP GRAND CHEROKEE">JEEP GRAND CHEROKEE</option>
                                    <option value="JEEP M151A1">JEEP M151A1</option>
                                    <option value="JEEP WAGONEER">JEEP WAGONEER</option>
                                    <option value="JEEP WRANGLER">JEEP WRANGLER</option>
                                    <option value="JEEP WRANGLER SAHARA">JEEP WRANGLER SAHARA</option>
                                    <option value="JEEP.M.151">JEEP.M.151</option>
                                    <option value="JEET WAGONEER">JEET WAGONEER</option>
                                    <option value="JELOCIFERO">JELOCIFERO</option>
                                    <option value="JENSEN">JENSEN</option>
                                    <option value="JESPA">JESPA</option>
                                    <option value="JHLE">JHLE</option>
                                    <option value="JIALING">JIALING</option>
                                    <option value="JIANGSU">JIANGSU</option>
                                    <option value="JIANGSU SINSKI">JIANGSU SINSKI</option>
                                    <option value="JIANMEN">JIANMEN</option>
                                    <option value="JIAXIANG">JIAXIANG</option>
                                    <option value="JIEFANG">JIEFANG</option>
                                    <option value="JILIN">JILIN</option>
                                    <option value="JIN HONG">JIN HONG</option>
                                    <option value="JINBEI">JINBEI</option>
                                    <option value="JINCHENG">JINCHENG</option>
                                    <option value="JINMA">JINMA</option>
                                    <option value="JINTAI">JINTAI</option>
                                    <option value="JLG">JLG</option>
                                    <option value="JMC">JMC</option>
                                    <option value="JOB ACE">JOB ACE</option>
                                    <option value="JOBACC">JOBACC</option>
                                    <option value="JOHN DEERE">JOHN DEERE</option>
                                    <option value="JOHNNY PAG">JOHNNY PAG</option>
                                    <option value="JOHS MOLLER S">JOHS MOLLER S</option>
                                    <option value="JOMDA">JOMDA</option>
                                    <option value="JONWAY">JONWAY</option>
                                    <option value="JOWETT">JOWETT</option>
                                    <option value="JOYLONG">JOYLONG</option>
                                    <option value="JRD">JRD</option>
                                    <option value="JSW">JSW</option>
                                    <option value="JSW">JSW</option>
                                    <option value="JUMP">JUMP</option>
                                    <option value="JUNJIN">JUNJIN</option>
                                    <option value="JUNO">JUNO</option>
                                    <option value="JUPITER">JUPITER</option>
                                    <option value="K.D.C">K.D.C</option>
                                    <option value="KABUTOMUSHI">KABUTOMUSHI</option>
                                    <option value="KAESSBOHRER">KAESSBOHRER</option>
                                    <option value="KAHO">KAHO</option>
                                    <option value="KAIQI">KAIQI</option>
                                    <option value="KAISER">KAISER</option>
                                    <option value="KALMAR OTTAWA">KALMAR OTTAWA</option>
                                    <option value="KALMARK">KALMARK</option>
                                    <option value="KAMA">KAMA</option>
                                    <option value="KAMOL">KAMOL</option>
                                    <option value="KAMUCH">KAMUCH</option>
                                    <option value="KANCIL">KANCIL</option>
                                    <option value="KANEKO">KANEKO</option>
                                    <option value="KANNON">KANNON</option>
                                    <option value="KANTO">KANTO</option>
                                    <option value="KANTO KIKAI">KANTO KIKAI</option>
                                    <option value="KANTO TEKKO">KANTO TEKKO</option>
                                    <option value="KANTOU">KANTOU</option>
                                    <option value="KANZAKI">KANZAKI</option>
                                    <option value="KARCHER">KARCHER</option>
                                    <option value="KARL SCHAEFF">KARL SCHAEFF</option>
                                    <option value="KARRY">KARRY</option>
                                    <option value="KARULA">KARULA</option>
                                    <option value="KASEA">KASEA</option>
                                    <option value="KASETPHATTANA">KASETPHATTANA</option>
                                    <option value="KAT">KAT</option>
                                    <option value="KATO">KATO</option>
                                    <option value="KAWAMA">KAWAMA</option>
                                    <option value="KAWASAKI">KAWASAKI</option>
                                    <option value="KAWASHIMA">KAWASHIMA</option>
                                    <option value="KEANHARVESTOR">KEANHARVESTOR</option>
                                    <option value="KEEWAY">KEEWAY</option>
                                    <option value="KEM">KEM</option>
                                    <option value="KEMCO">KEMCO</option>
                                    <option value="KENBO">KENBO</option>
                                    <option value="KENWORTH">KENWORTH</option>
                                    <option value="KH">KH</option>
                                    <option value="KHD DEUTZ">KHD DEUTZ</option>
                                    <option value="KIA">KIA</option>
                                    <option value="KIA MASTER">KIA MASTER</option>
                                    <option value="KIATA">KIATA</option>
                                    <option value="KIBUYA">KIBUYA</option>
                                    <option value="KIDINA">KIDINA</option>
                                    <option value="KIMCO">KIMCO</option>
                                    <option value="KIMUN">KIMUN</option>
                                    <option value="KINGFU">KINGFU</option>
                                    <option value="KINGLONG">KINGLONG</option>
                                    <option value="KINKI ISHIKO">KINKI ISHIKO</option>
                                    <option value="KIOTI">KIOTI</option>
                                    <option value="KIURITZ ECHO">KIURITZ ECHO</option>
                                    <option value="KMT">KMT</option>
                                    <option value="KMT CANE HARVESTER">KMT CANE HARVESTER</option>
                                    <option value="KOBELCO">KOBELCO</option>
                                    <option value="KOBELCO MINI">KOBELCO MINI</option>
                                    <option value="KOGA">KOGA</option>
                                    <option value="KOHASHI">KOHASHI</option>
                                    <option value="KOMATSU">KOMATSU</option>
                                    <option value="KONECRANES">KONECRANES</option>
                                    <option value="KONOVA">KONOVA</option>
                                    <option value="KONTENA">KONTENA</option>
                                    <option value="KOUGAR">KOUGAR</option>
                                    <option value="KOVROVETS">KOVROVETS</option>
                                    <option value="KOZAWA">KOZAWA</option>
                                    <option value="KRAFT TECH">KRAFT TECH</option>
                                    <option value="KREIDLER">KREIDLER</option>
                                    <option value="KRIEGER">KRIEGER</option>
                                    <option value="KTM">KTM</option>
                                    <option value="KUBOTA">KUBOTA</option>
                                    <option value="KUKJE">KUKJE</option>
                                    <option value="KULING">KULING</option>
                                    <option value="KUMIAI">KUMIAI</option>
                                    <option value="KWAI THONG">KWAI THONG</option>
                                    <option value="KYC">KYC</option>
                                    <option value="KYMCO">KYMCO</option>
                                    <option value="KYOEISHA BARONESS">KYOEISHA BARONESS</option>
                                    <option value="KYOKUTO">KYOKUTO</option>
                                    <option value="KYORITSU">KYORITSU</option>
                                    <option value="L&P">L&P</option>
                                    <option value="LADA">LADA</option>
                                    <option value="LAFER">LAFER</option>
                                    <option value="LAGONDA">LAGONDA</option>
                                    <option value="LAMBORGHINI">LAMBORGHINI</option>
                                    <option value="LAMBRETTA">LAMBRETTA</option>
                                    <option value="LANCHESTER">LANCHESTER</option>
                                    <option value="LANCIA">LANCIA</option>
                                    <option value="LAND ROVER">LAND ROVER</option>
                                    <option value="LANDINI">LANDINI</option>
                                    <option value="LAVERDA">LAVERDA</option>
                                    <option value="LAWIL">LAWIL</option>
                                    <option value="LAYLAND">LAYLAND</option>
                                    <option value="LB25">LB25</option>
                                    <option value="LEA-FRANCIS">LEA-FRANCIS</option>
                                    <option value="LEBRERO">LEBRERO</option>
                                    <option value="LEDL">LEDL</option>
                                    <option value="LEEBOY">LEEBOY</option>
                                    <option value="LENHAM">LENHAM</option>
                                    <option value="LENOIR">LENOIR</option>
                                    <option value="LEOVDAGO">LEOVDAGO</option>
                                    <option value="LEXUS">LEXUS</option>
                                    <option value="LEYLAND">LEYLAND</option>
                                    <option value="LEYLAND">LEYLAND</option>
                                    <option value="LG">LG</option>
                                    <option value="LGMG">LGMG</option>
                                    <option value="LIB BHERR">LIB BHERR</option>
                                    <option value="LIBA">LIBA</option>
                                    <option value="LIEBHERR">LIEBHERR</option>
                                    <option value="LIFAN">LIFAN</option>
                                    <option value="LIFT">LIFT</option>
                                    <option value="LIFT KING">LIFT KING</option>
                                    <option value="LIGIER">LIGIER</option>
                                    <option value="LIMO">LIMO</option>
                                    <option value="LINCOLE">LINCOLE</option>
                                    <option value="LINCOLN">LINCOLN</option>
                                    <option value="LINDE">LINDE</option>
                                    <option value="LINDE AG">LINDE AG</option>
                                    <option value="LINHER">LINHER</option>
                                    <option value="LINTEX">LINTEX</option>
                                    <option value="LION">LION</option>
                                    <option value="LISHIDE">LISHIDE</option>
                                    <option value="LISTER">LISTER</option>
                                    <option value="LISTER PETTER">LISTER PETTER</option>
                                    <option value="LITTLE JOHN">LITTLE JOHN</option>
                                    <option value="LIUGONG">LIUGONG</option>
                                    <option value="LLOYD">LLOYD</option>
                                    <option value="LML">LML</option>
                                    <option value="LMX">LMX</option>
                                    <option value="LOCATELLI">LOCATELLI</option>
                                    <option value="LOCOMOBILE">LOCOMOBILE</option>
                                    <option value="LONCIN">LONCIN</option>
                                    <option value="LONDON ROUTMASTER">LONDON ROUTMASTER</option>
                                    <option value="LONDON TAXI">LONDON TAXI</option>
                                    <option value="LONDONCAB">LONDONCAB</option>
                                    <option value="LONDON_CAB">LONDON_CAB</option>
                                    <option value="LONKING">LONKING</option>
                                    <option value="LORAIN">LORAIN</option>
                                    <option value="LOTUS">LOTUS</option>
                                    <option value="LOVOL">LOVOL</option>
                                    <option value="LTD">LTD</option>
                                    <option value="LTMA">LTMA</option>
                                    <option value="LUAZ">LUAZ</option>
                                    <option value="LUCKY">LUCKY</option>
                                    <option value="LUCKY LION">LUCKY LION</option>
                                    <option value="LUFENG">LUFENG</option>
                                    <option value="LUGONG">LUGONG</option>
                                    <option value="LULEY">LULEY</option>
                                    <option value="LUNAR">LUNAR</option>
                                    <option value="LUYUAN">LUYUAN</option>
                                    <option value="LUZHONG">LUZHONG</option>
                                    <option value="LYNX">LYNX</option>
                                    <option value="M BIKE">M BIKE</option>
                                    <option value="M.G.B.">M.G.B.</option>
                                    <option value="M.K.S. ฟาร์ม จำกัด">M.K.S. ฟาร์ม จำกัด</option>
                                    <option value="M.T.">M.T.</option>
                                    <option value="M.Z.">M.Z.</option>
                                    <option value="MACK">MACK</option>
                                    <option value="MAEDA">MAEDA</option>
                                    <option value="MAGDOS">MAGDOS</option>
                                    <option value="MAGIRUS">MAGIRUS</option>
                                    <option value="MAHINDRA">MAHINDRA</option>
                                    <option value="MAIT">MAIT</option>
                                    <option value="MAKEERUS">MAKEERUS</option>
                                    <option value="MALAGUTI">MALAGUTI</option>
                                    <option value="MALIENNE">MALIENNE</option>
                                    <option value="MAMETORA">MAMETORA</option>
                                    <option value="MAN">MAN</option>
                                    <option value="MANITOU">MANITOU</option>
                                    <option value="MANITOWOC">MANITOWOC</option>
                                    <option value="MANOCH 1999">MANOCH 1999</option>
                                    <option value="MANTIS">MANTIS</option>
                                    <option value="MARCHETTI">MARCHETTI</option>
                                    <option value="MARCOS">MARCOS</option>
                                    <option value="MARMON">MARMON</option>
                                    <option value="MARTINI">MARTINI</option>
                                    <option value="MARUSHO LILAC">MARUSHO LILAC</option>
                                    <option value="MARUTI">MARUTI</option>
                                    <option value="MARUYAMA">MARUYAMA</option>
                                    <option value="MASERATI">MASERATI</option>
                                    <option value="MASSCYFERCUSON">MASSCYFERCUSON</option>
                                    <option value="MASSEY">MASSEY</option>
                                    <option value="MASSEY FERGUSON">MASSEY FERGUSON</option>
                                    <option value="MASSEY FUROUSON">MASSEY FUROUSON</option>
                                    <option value="MASTANG">MASTANG</option>
                                    <option value="MASTER">MASTER</option>
                                    <option value="MATCHLESS">MATCHLESS</option>
                                    <option value="MATHADORE">MATHADORE</option>
                                    <option value="MATHIEU">MATHIEU</option>
                                    <option value="MATHIS">MATHIS</option>
                                    <option value="MATRA">MATRA</option>
                                    <option value="MATSUOKA">MATSUOKA</option>
                                    <option value="MAUDSLAY">MAUDSLAY</option>
                                    <option value="MAX">MAX</option>
                                    <option value="MAXIMAL">MAXIMAL</option>
                                    <option value="MAXIUM">MAXIUM</option>
                                    <option value="MAXUS">MAXUS</option>
                                    <option value="MAXWELL">MAXWELL</option>
                                    <option value="MAYBACH">MAYBACH</option>
                                    <option value="MAZDA">MAZDA</option>
                                    <option value="MAZUDA">MAZUDA</option>
                                    <option value="MBC">MBC</option>
                                    <option value="MBU">MBU</option>
                                    <option value="MC LAUGHLIN">MC LAUGHLIN</option>
                                    <option value="MC.LAREN">MC.LAREN</option>
                                    <option value="MCC SMART">MCC SMART</option>
                                    <option value="MCLAREN">MCLAREN</option>
                                    <option value="MCTROPOLITAN">MCTROPOLITAN</option>
                                    <option value="MEADOW">MEADOW</option>
                                    <option value="MECALAC">MECALAC</option>
                                    <option value="MEIWA">MEIWA</option>
                                    <option value="MEIWA">MEIWA</option>
                                    <option value="MELROE">MELROE</option>
                                    <option value="MERCEDES">MERCEDES</option>
                                    <option value="MERCEDES BENZ">MERCEDES BENZ</option>
                                    <option value="MERCER">MERCER</option>
                                    <option value="MERCURY">MERCURY</option>
                                    <option value="MESSERSCHMITT">MESSERSCHMITT</option>
                                    <option value="METALLURGIQUE">METALLURGIQUE</option>
                                    <option value="METROPOLITAN">METROPOLITAN</option>
                                    <option value="MF">MF</option>
                                    <option value="MFL">MFL</option>
                                    <option value="MG">MG</option>
                                    <option value="MGA">MGA</option>
                                    <option value="MIANYANG">MIANYANG</option>
                                    <option value="MIDAS">MIDAS</option>
                                    <option value="MIDEA">MIDEA</option>
                                    <option value="MIDLAND">MIDLAND</option>
                                    <option value="MIGHTY">MIGHTY</option>
                                    <option value="MIKASA">MIKASA</option>
                                    <option value="MINCHEI">MINCHEI</option>
                                    <option value="MINDORO">MINDORO</option>
                                    <option value="MINERVA">MINERVA</option>
                                    <option value="MINEX">MINEX</option>
                                    <option value="MINI">MINI</option>
                                    <option value="MINI AUSTIN">MINI AUSTIN</option>
                                    <option value="MINI BMW">MINI BMW</option>
                                    <option value="MINI BMW COOPER">MINI BMW COOPER</option>
                                    <option value="MINI COOPER">MINI COOPER</option>
                                    <option value="MINI COOPER AUSTIN">MINI COOPER AUSTIN</option>
                                    <option value="MINI COOPER BMW">MINI COOPER BMW</option>
                                    <option value="MINI COOPER RHB">MINI COOPER RHB</option>
                                    <option value="MINI COOPER ROVER">MINI COOPER ROVER</option>
                                    <option value="MINI MITSUBISHI">MINI MITSUBISHI</option>
                                    <option value="MINI PAJERO">MINI PAJERO</option>
                                    <option value="MINI ROVER">MINI ROVER</option>
                                    <option value="MINUTEMAN POWERBOSS">MINUTEMAN POWERBOSS</option>
                                    <option value="MITSU">MITSU</option>
                                    <option value="MITSUBISHI">MITSUBISHI</option>
                                    <option value="MITSUBISHI FUSO">MITSUBISHI FUSO</option>
                                    <option value="MITSUDEUTZ">MITSUDEUTZ</option>
                                    <option value="MITSUDUE">MITSUDUE</option>
                                    <option value="MITSUI">MITSUI</option>
                                    <option value="MITSUI DEUT">MITSUI DEUT</option>
                                    <option value="MITSUI DEUTZ">MITSUI DEUTZ</option>
                                    <option value="MITSUI EIMCO">MITSUI EIMCO</option>
                                    <option value="MITSUI JSW">MITSUI JSW</option>
                                    <option value="MITSUIZOUSEN">MITSUIZOUSEN</option>
                                    <option value="MITSUL">MITSUL</option>
                                    <option value="MITSUOKA">MITSUOKA</option>
                                    <option value="MNNCK">MNNCK</option>
                                    <option value="MOBIL">MOBIL</option>
                                    <option value="MODENAS">MODENAS</option>
                                    <option value="MOELVEN">MOELVEN</option>
                                    <option value="MOGAN">MOGAN</option>
                                    <option value="MOHICAN">MOHICAN</option>
                                    <option value="MOHS">MOHS</option>
                                    <option value="MOKE">MOKE</option>
                                    <option value="MONDIAL">MONDIAL</option>
                                    <option value="MONIKA">MONIKA</option>
                                    <option value="MONIKA AEC">MONIKA AEC</option>
                                    <option value="MONOROKA">MONOROKA</option>
                                    <option value="MONTESA">MONTESA</option>
                                    <option value="MONTEVERDI">MONTEVERDI</option>
                                    <option value="MOON">MOON</option>
                                    <option value="MOOROOKA">MOOROOKA</option>
                                    <option value="MOPAR">MOPAR</option>
                                    <option value="MOPETTA">MOPETTA</option>
                                    <option value="MORETTI">MORETTI</option>
                                    <option value="MORGAN">MORGAN</option>
                                    <option value="MOROOKA">MOROOKA</option>
                                    <option value="MORRIS">MORRIS</option>
                                    <option value="MORS">MORS</option>
                                    <option value="MOSKVICH">MOSKVICH</option>
                                    <option value="MOTAD">MOTAD</option>
                                    <option value="MOTARD">MOTARD</option>
                                    <option value="MOTO APRILIA">MOTO APRILIA</option>
                                    <option value="MOTOACE">MOTOACE</option>
                                    <option value="MOTOGUZZI">MOTOGUZZI</option>
                                    <option value="MOTORCONFROT">MOTORCONFROT</option>
                                    <option value="MOTORRUC">MOTORRUC</option>
                                    <option value="MOTORTRICYCLE">MOTORTRICYCLE</option>
                                    <option value="MOWOG">MOWOG</option>
                                    <option value="MST">MST</option>
                                    <option value="MTU">MTU</option>
                                    <option value="MUBOTA">MUBOTA</option>
                                    <option value="MUDAN">MUDAN</option>
                                    <option value="MUIRHILL">MUIRHILL</option>
                                    <option value="MULTIONE">MULTIONE</option>
                                    <option value="MUSSO">MUSSO</option>
                                    <option value="MUSSOSSANYONG">MUSSOSSANYONG</option>
                                    <option value="MUSSZO">MUSSZO</option>
                                    <option value="MUZ">MUZ</option>
                                    <option value="MV AGUSTA">MV AGUSTA</option>
                                    <option value="MV.AGUSTA">MV.AGUSTA</option>
                                    <option value="MVAGUSTA">MVAGUSTA</option>
                                    <option value="MWM">MWM</option>
                                    <option value="MZ">MZ</option>
                                    <option value="NAG">NAG</option>
                                    <option value="NAGANO">NAGANO</option>
                                    <option value="NAGANT">NAGANT</option>
                                    <option value="NAKAMICHI">NAKAMICHI</option>
                                    <option value="NAKANIHON">NAKANIHON</option>
                                    <option value="NAKARIES">NAKARIES</option>
                                    <option value="NAKATA">NAKATA</option>
                                    <option value="NAM YOUG">NAM YOUG</option>
                                    <option value="NAMADE">NAMADE</option>
                                    <option value="NAMHENG">NAMHENG</option>
                                    <option value="NANCHONG">NANCHONG</option>
                                    <option value="NANJING DALUGE">NANJING DALUGE</option>
                                    <option value="NANNEI">NANNEI</option>
                                    <option value="NAPIER">NAPIER</option>
                                    <option value="NARDI">NARDI</option>
                                    <option value="NASH">NASH</option>
                                    <option value="NAZA">NAZA</option>
                                    <option value="NCA">NCA</option>
                                    <option value="NCAENFIELD">NCAENFIELD</option>
                                    <option value="NENAHO">NENAHO</option>
                                    <option value="NEON">NEON</option>
                                    <option value="NEOPLAN">NEOPLAN</option>
                                    <option value="NEUSON">NEUSON</option>
                                    <option value="NEUSON ERA">NEUSON ERA</option>
                                    <option value="NEVAL">NEVAL</option>
                                    <option value="NEW BEETLE 2001">NEW BEETLE 2001</option>
                                    <option value="NEW BEETLE 2002">NEW BEETLE 2002</option>
                                    <option value="NEW MINI">NEW MINI</option>
                                    <option value="NEWHOLLAND">NEWHOLLAND</option>
                                    <option value="NICATA">NICATA</option>
                                    <option value="NICE">NICE</option>
                                    <option value="NICHIYU">NICHIYU</option>
                                    <option value="NICHU">NICHU</option>
                                    <option value="NICOLLAS">NICOLLAS</option>
                                    <option value="NIGATA">NIGATA</option>
                                    <option value="NIHON">NIHON</option>
                                    <option value="NIHON SEIKOJYO">NIHON SEIKOJYO</option>
                                    <option value="NIHON SEITETSU">NIHON SEITETSU</option>
                                    <option value="NIHON-SEIKOSYO">NIHON-SEIKOSYO</option>
                                    <option value="NIHONSEIDO">NIHONSEIDO</option>
                                    <option value="NIIGATA">NIIGATA</option>
                                    <option value="NIIGATA PAVER">NIIGATA PAVER</option>
                                    <option value="NIKKEN">NIKKEN</option>
                                    <option value="NIKKO">NIKKO</option>
                                    <option value="NILFISK">NILFISK</option>
                                    <option value="NILFISK-ADVANCE">NILFISK-ADVANCE</option>
                                    <option value="NINKO">NINKO</option>
                                    <option value="NIPLO">NIPLO</option>
                                    <option value="NIPPON">NIPPON</option>
                                    <option value="NIPPON DENSO">NIPPON DENSO</option>
                                    <option value="NIPPON SHARYO">NIPPON SHARYO</option>
                                    <option value="NIPPONSEIDO">NIPPONSEIDO</option>
                                    <option value="NISCHU">NISCHU</option>
                                    <option value="NISSAN">NISSAN</option>
                                    <option value="NISSAN DIESEL">NISSAN DIESEL</option>
                                    <option value="NISSHA">NISSHA</option>
                                    <option value="NITRO">NITRO</option>
                                    <option value="NITTOKU">NITTOKU</option>
                                    <option value="NITTORE">NITTORE</option>
                                    <option value="NIVA">NIVA</option>
                                    <option value="NKT">NKT</option>
                                    <option value="NODA">NODA</option>
                                    <option value="NON">NON</option>
                                    <option value="NORDBERG">NORDBERG</option>
                                    <option value="NORTH BENZ">NORTH BENZ</option>
                                    <option value="NORTON">NORTON</option>
                                    <option value="NOVITEC">NOVITEC</option>
                                    <option value="NRT">NRT</option>
                                    <option value="NSK">NSK</option>
                                    <option value="NSU">NSU</option>
                                    <option value="NTK">NTK</option>
                                    <option value="NYK">NYK</option>
                                    <option value="O&K">O&K</option>
                                    <option value="OA">OA</option>
                                    <option value="OAKLAND">OAKLAND</option>
                                    <option value="OB&D">OB&D</option>
                                    <option value="OBAKE">OBAKE</option>
                                    <option value="OIKAWA">OIKAWA</option>
                                    <option value="OJIANG">OJIANG</option>
                                    <option value="OKADA">OKADA</option>
                                    <option value="OKAMATA">OKAMATA</option>
                                    <option value="OKAMATO">OKAMATO</option>
                                    <option value="OKAMOTO">OKAMOTO</option>
                                    <option value="OKIKAWA">OKIKAWA</option>
                                    <option value="OKUDAYAGIKEN">OKUDAYAGIKEN</option>
                                    <option value="OLDSMOBILE">OLDSMOBILE</option>
                                    <option value="OLDTIMERBAU">OLDTIMERBAU</option>
                                    <option value="OLICIT">OLICIT</option>
                                    <option value="OM">OM</option>
                                    <option value="OMNITEK">OMNITEK</option>
                                    <option value="OPEL">OPEL</option>
                                    <option value="ORSA">ORSA</option>
                                    <option value="OSAKA SHARYU">OSAKA SHARYU</option>
                                    <option value="OSCA">OSCA</option>
                                    <option value="OTAS">OTAS</option>
                                    <option value="OTOSAN">OTOSAN</option>
                                    <option value="OTTAWA">OTTAWA</option>
                                    <option value="OWEN">OWEN</option>
                                    <option value="OWEN MAGNETIC">OWEN MAGNETIC</option>
                                    <option value="OYAMA">OYAMA</option>
                                    <option value="P & H">P & H</option>
                                    <option value="P & H OMEGA">P & H OMEGA</option>
                                    <option value="PACKARD">PACKARD</option>
                                    <option value="PANHARD">PANHARD</option>
                                    <option value="PANTHER">PANTHER</option>
                                    <option value="PANUS">PANUS</option>
                                    <option value="PARAGON">PARAGON</option>
                                    <option value="PASSAT">PASSAT</option>
                                    <option value="PATROL">PATROL</option>
                                    <option value="PAUS">PAUS</option>
                                    <option value="PAYKAH">PAYKAH</option>
                                    <option value="PDK">PDK</option>
                                    <option value="PEDA">PEDA</option>
                                    <option value="PEERLESS">PEERLESS</option>
                                    <option value="PEGASO">PEGASO</option>
                                    <option value="PEKKING">PEKKING</option>
                                    <option value="PENFECTION">PENFECTION</option>
                                    <option value="PENGUIN">PENGUIN</option>
                                    <option value="PENNINGTON">PENNINGTON</option>
                                    <option value="PERFORMANCE">PERFORMANCE</option>
                                    <option value="PERKINS">PERKINS</option>
                                    <option value="Perm-motor">Perm-motor</option>
                                    <option value="PERODUA">PERODUA</option>
                                    <option value="PETERBILT">PETERBILT</option>
                                    <option value="PETTER">PETTER</option>
                                    <option value="PETTYBON">PETTYBON</option>
                                    <option value="PEUGEOT">PEUGEOT</option>
                                    <option value="PGO">PGO</option>
                                    <option value="PHILLIPS">PHILLIPS</option>
                                    <option value="PHOEBUS">PHOEBUS</option>
                                    <option value="PHOENIX">PHOENIX</option>
                                    <option value="PHOLASITH">PHOLASITH</option>
                                    <option value="PIAGGIO">PIAGGIO</option>
                                    <option value="PICCARD-PICTET">PICCARD-PICTET</option>
                                    <option value="PIERCE">PIERCE</option>
                                    <option value="PIERCE-ARROW">PIERCE-ARROW</option>
                                    <option value="PININFARINA">PININFARINA</option>
                                    <option value="PINZGAUER">PINZGAUER</option>
                                    <option value="PIPER">PIPER</option>
                                    <option value="PLATINUM">PLATINUM</option>
                                    <option value="PLYMOUTH">PLYMOUTH</option>
                                    <option value="POCLAIN">POCLAIN</option>
                                    <option value="POINTER">POINTER</option>
                                    <option value="POLARIS">POLARIS</option>
                                    <option value="POLARSUN">POLARSUN</option>
                                    <option value="POLSKI-FIAT">POLSKI-FIAT</option>
                                    <option value="PONTIAC">PONTIAC</option>
                                    <option value="POPE">POPE</option>
                                    <option value="PORSCHE">PORSCHE</option>
                                    <option value="PORSCHE CAYENNE">PORSCHE CAYENNE</option>
                                    <option value="PORTARO">PORTARO</option>
                                    <option value="POTENTE">POTENTE</option>
                                    <option value="POWER BOSS">POWER BOSS</option>
                                    <option value="Power Iron Bull">Power Iron Bull</option>
                                    <option value="POWERPAC">POWERPAC</option>
                                    <option value="POWERPLUS">POWERPLUS</option>
                                    <option value="PREMIER">PREMIER</option>
                                    <option value="PRINCESS">PRINCESS</option>
                                    <option value="PRO-LAMPAC">PRO-LAMPAC</option>
                                    <option value="PROTON">PROTON</option>
                                    <option value="PS">PS</option>
                                    <option value="PUCH">PUCH</option>
                                    <option value="PUCH GELAND">PUCH GELAND</option>
                                    <option value="PULIMAT">PULIMAT</option>
                                    <option value="PUMA">PUMA</option>
                                    <option value="PUMAC">PUMAC</option>
                                    <option value="PWT">PWT</option>
                                    <option value="PX">PX</option>
                                    <option value="QINGQI">QINGQI</option>
                                    <option value="QT">QT</option>
                                    <option value="QUJO">QUJO</option>
                                    <option value="R-REX">R-REX</option>
                                    <option value="RABA">RABA</option>
                                    <option value="RABBIT">RABBIT</option>
                                    <option value="RABIT">RABIT</option>
                                    <option value="RADICAL">RADICAL</option>
                                    <option value="RAGE">RAGE</option>
                                    <option value="RAILTON">RAILTON</option>
                                    <option value="RAJDOOD">RAJDOOD</option>
                                    <option value="RALEIGH">RALEIGH</option>
                                    <option value="RAMBLER">RAMBLER</option>
                                    <option value="RAMBRETTA">RAMBRETTA</option>
                                    <option value="RAMINATE">RAMINATE</option>
                                    <option value="RANGE ROVER">RANGE ROVER</option>
                                    <option value="RANGER">RANGER</option>
                                    <option value="RANSOMES">RANSOMES</option>
                                    <option value="RAVO">RAVO</option>
                                    <option value="RAYGO">RAYGO</option>
                                    <option value="RAYGO RASCAL">RAYGO RASCAL</option>
                                    <option value="RAYGO-WAGNER">RAYGO-WAGNER</option>
                                    <option value="RCM">RCM</option>
                                    <option value="RD">RD</option>
                                    <option value="REAN ROVER">REAN ROVER</option>
                                    <option value="RED FLAG">RED FLAG</option>
                                    <option value="REELMASTER">REELMASTER</option>
                                    <option value="RELIANCE ELECTRIC">RELIANCE ELECTRIC</option>
                                    <option value="RELIANT">RELIANT</option>
                                    <option value="RELIANT">RELIANT</option>
                                    <option value="RELY">RELY</option>
                                    <option value="RENAULT">RENAULT</option>
                                    <option value="REO">REO</option>
                                    <option value="REX">REX</option>
                                    <option value="RHINOCEROS">RHINOCEROS</option>
                                    <option value="RICHARD-BRASIER">RICHARD-BRASIER</option>
                                    <option value="RIKUO">RIKUO</option>
                                    <option value="RILEY">RILEY</option>
                                    <option value="ROADKING">ROADKING</option>
                                    <option value="ROADPATCH">ROADPATCH</option>
                                    <option value="ROADTEC">ROADTEC</option>
                                    <option value="ROBET">ROBET</option>
                                    <option value="ROBEX">ROBEX</option>
                                    <option value="ROBIN">ROBIN</option>
                                    <option value="ROCHET-SCHNEIDER">ROCHET-SCHNEIDER</option>
                                    <option value="ROCON SCOUT">ROCON SCOUT</option>
                                    <option value="ROLLAND-PILAIN">ROLLAND-PILAIN</option>
                                    <option value="ROLLS-ROYCE">ROLLS-ROYCE</option>
                                    <option value="ROSCO">ROSCO</option>
                                    <option value="ROSENBAUER">ROSENBAUER</option>
                                    <option value="ROSSION">ROSSION</option>
                                    <option value="ROVER">ROVER</option>
                                    <option value="ROVER MINI">ROVER MINI</option>
                                    <option value="ROVER MINI COOPER">ROVER MINI COOPER</option>
                                    <option value="ROYAL">ROYAL</option>
                                    <option value="ROYAL ENFIELD">ROYAL ENFIELD</option>
                                    <option value="RUBBLE MASTER">RUBBLE MASTER</option>
                                    <option value="RUEHAUF">RUEHAUF</option>
                                    <option value="RUF">RUF</option>
                                    <option value="RUMPLER">RUMPLER</option>
                                    <option value="RUSKA">RUSKA</option>
                                    <option value="RUTHMEYER">RUTHMEYER</option>
                                    <option value="RYUKA">RYUKA</option>
                                    <option value="S & B">S & B</option>
                                    <option value="S&B">S&B</option>
                                    <option value="S&S">S&S</option>
                                    <option value="S-MAC">S-MAC</option>
                                    <option value="S.C.T.">S.C.T.</option>
                                    <option value="S.T.C.">S.T.C.</option>
                                    <option value="S.T.TUK TUK">S.T.TUK TUK</option>
                                    <option value="SAAB">SAAB</option>
                                    <option value="SACHS">SACHS</option>
                                    <option value="SACHS SPIDER">SACHS SPIDER</option>
                                    <option value="SADRE">SADRE</option>
                                    <option value="SAETS">SAETS</option>
                                    <option value="SAKAI">SAKAI</option>
                                    <option value="SAKAI ROLLER">SAKAI ROLLER</option>
                                    <option value="SAKPATTANA">SAKPATTANA</option>
                                    <option value="SALMSON">SALMSON</option>
                                    <option value="SAMAND">SAMAND</option>
                                    <option value="SAME">SAME</option>
                                    <option value="SAME DEUTZ-FAHR">SAME DEUTZ-FAHR</option>
                                    <option value="SAMMIT">SAMMIT</option>
                                    <option value="SAMMITR">SAMMITR</option>
                                    <option value="SAMPO">SAMPO</option>
                                    <option value="SAMRUAY TUK TUK">SAMRUAY TUK TUK</option>
                                    <option value="SAMSING">SAMSING</option>
                                    <option value="SAMSUNG">SAMSUNG</option>
                                    <option value="SANDERSON">SANDERSON</option>
                                    <option value="SANDVIK">SANDVIK</option>
                                    <option value="SANGARUN">SANGARUN</option>
                                    <option value="SANGYUNG">SANGYUNG</option>
                                    <option value="SANIT">SANIT</option>
                                    <option value="SANLG">SANLG</option>
                                    <option value="SANWA">SANWA</option>
                                    <option value="SANY">SANY</option>
                                    <option value="SANYCO">SANYCO</option>
                                    <option value="SANYO">SANYO</option>
                                    <option value="SANYONG">SANYONG</option>
                                    <option value="SAT">SAT</option>
                                    <option value="SATO">SATO</option>
                                    <option value="SATOH">SATOH</option>
                                    <option value="SATOH TRACTOR">SATOH TRACTOR</option>
                                    <option value="SATURN">SATURN</option>
                                    <option value="SAV">SAV</option>
                                    <option value="SAVALCO">SAVALCO</option>
                                    <option value="SBARRO">SBARRO</option>
                                    <option value="SBY">SBY</option>
                                    <option value="SCAMMELL">SCAMMELL</option>
                                    <option value="SCANIA">SCANIA</option>
                                    <option value="SCHAEFF TEREX">SCHAEFF TEREX</option>
                                    <option value="SCIMITAR">SCIMITAR</option>
                                    <option value="SCOMADI">SCOMADI</option>
                                    <option value="SCORPA">SCORPA</option>
                                    <option value="SCSAEFF">SCSAEFF</option>
                                    <option value="SCT">SCT</option>
                                    <option value="SDEC">SDEC</option>
                                    <option value="SDLG">SDLG</option>
                                    <option value="SDLS">SDLS</option>
                                    <option value="SEA DOO">SEA DOO</option>
                                    <option value="SEAT">SEAT</option>
                                    <option value="SEIREI">SEIREI</option>
                                    <option value="SEKI KOCHI">SEKI KOCHI</option>
                                    <option value="SELADANG">SELADANG</option>
                                    <option value="SEM">SEM</option>
                                    <option value="SEMITRAILER">SEMITRAILER</option>
                                    <option value="SEN-NOH">SEN-NOH</option>
                                    <option value="SENNEBOGEN">SENNEBOGEN</option>
                                    <option value="SERENISSIMA">SERENISSIMA</option>
                                    <option value="SERPOLLET">SERPOLLET</option>
                                    <option value="SERVETA">SERVETA</option>
                                    <option value="SETOH">SETOH</option>
                                    <option value="SEVEL">SEVEL</option>
                                    <option value="SEVEN">SEVEN</option>
                                    <option value="SHACMAN">SHACMAN</option>
                                    <option value="SHACMAN">SHACMAN</option>
                                    <option value="SHANDONG">SHANDONG</option>
                                    <option value="SHANDONG WEICHAI">SHANDONG WEICHAI</option>
                                    <option value="SHANGCHAI">SHANGCHAI</option>
                                    <option value="SHANGHAI">SHANGHAI</option>
                                    <option value="SHANGHAI DIESEL">SHANGHAI DIESEL</option>
                                    <option value="SHANGHAI DINGHAN">SHANGHAI DINGHAN</option>
                                    <option value="SHANGONG">SHANGONG</option>
                                    <option value="SHANTUI">SHANTUI</option>
                                    <option value="SHEFFIELD-SIMPLEX">SHEFFIELD-SIMPLEX</option>
                                    <option value="SHEN ZHEN">SHEN ZHEN</option>
                                    <option value="SHENNIU">SHENNIU</option>
                                    <option value="SHERCO">SHERCO</option>
                                    <option value="SHIBAURA">SHIBAURA</option>
                                    <option value="SHIBUARA">SHIBUARA</option>
                                    <option value="SHIFENG">SHIFENG</option>
                                    <option value="SHIKOKU">SHIKOKU</option>
                                    <option value="SHIKOKUKENKI">SHIKOKUKENKI</option>
                                    <option value="SHINERAY">SHINERAY</option>
                                    <option value="SHINKO">SHINKO</option>
                                    <option value="SHIROTA">SHIROTA</option>
                                    <option value="SHOPPER">SHOPPER</option>
                                    <option value="SHOWA">SHOWA</option>
                                    <option value="SIAM">SIAM</option>
                                    <option value="SIAM KUBOTA">SIAM KUBOTA</option>
                                    <option value="SIATA">SIATA</option>
                                    <option value="SIDDELEY">SIDDELEY</option>
                                    <option value="SIKOKU">SIKOKU</option>
                                    <option value="SIKOR949">SIKOR949</option>
                                    <option value="SIMCA">SIMCA</option>
                                    <option value="SIMESA">SIMESA</option>
                                    <option value="SIMON">SIMON</option>
                                    <option value="SIMPLEX">SIMPLEX</option>
                                    <option value="SIMPSONS">SIMPSONS</option>
                                    <option value="SINGER">SINGER</option>
                                    <option value="SINGTHAI">SINGTHAI</option>
                                    <option value="SINOMACH">SINOMACH</option>
                                    <option value="SINOTRUK">SINOTRUK</option>
                                    <option value="SINOTRUK HOHAN">SINOTRUK HOHAN</option>
                                    <option value="SINOTRUK HOWO">SINOTRUK HOWO</option>
                                    <option value="SINOWAY">SINOWAY</option>
                                    <option value="SINZAIRE">SINZAIRE</option>
                                    <option value="SIPANI">SIPANI</option>
                                    <option value="SISU">SISU</option>
                                    <option value="SIVA">SIVA</option>
                                    <option value="SK.TUK TUK">SK.TUK TUK</option>
                                    <option value="SKIPPER">SKIPPER</option>
                                    <option value="SKODA">SKODA</option>
                                    <option value="SKY">SKY</option>
                                    <option value="SKYGO">SKYGO</option>
                                    <option value="SKYWELL">SKYWELL</option>
                                    <option value="SKYWING">SKYWING</option>
                                    <option value="SLURRY PAVER">SLURRY PAVER</option>
                                    <option value="SMART">SMART</option>
                                    <option value="SNDVIK">SNDVIK</option>
                                    <option value="SNK">SNK</option>
                                    <option value="SNORKEL">SNORKEL</option>
                                    <option value="SNOW">SNOW</option>
                                    <option value="SOFIM">SOFIM</option>
                                    <option value="SOGO">SOGO</option>
                                    <option value="SOILMEC">SOILMEC</option>
                                    <option value="SOKON">SOKON</option>
                                    <option value="SOLEX">SOLEX</option>
                                    <option value="SONALIKA">SONALIKA</option>
                                    <option value="SONYONG">SONYONG</option>
                                    <option value="SOONSAN">SOONSAN</option>
                                    <option value="SOOSAN">SOOSAN</option>
                                    <option value="SPA">SPA</option>
                                    <option value="SPARTAN">SPARTAN</option>
                                    <option value="SPB">SPB</option>
                                    <option value="SPCN">SPCN</option>
                                    <option value="SPCNS">SPCNS</option>
                                    <option value="SPYKER">SPYKER</option>
                                    <option value="SQUIRE">SQUIRE</option>
                                    <option value="SRC">SRC</option>
                                    <option value="SRC-TUK TUK">SRC-TUK TUK</option>
                                    <option value="SRIKOSAK">SRIKOSAK</option>
                                    <option value="SRTT TUK TUK">SRTT TUK TUK</option>
                                    <option value="SSANGYONG">SSANGYONG</option>
                                    <option value="SSANGYONG">SSANGYONG</option>
                                    <option value="ST">ST</option>
                                    <option value="STA">STA</option>
                                    <option value="STA MATILDE">STA MATILDE</option>
                                    <option value="STALLION">STALLION</option>
                                    <option value="STALLIONS">STALLIONS</option>
                                    <option value="STANDARD">STANDARD</option>
                                    <option value="STANLEY">STANLEY</option>
                                    <option value="STANOSTROJ">STANOSTROJ</option>
                                    <option value="STAR">STAR</option>
                                    <option value="STAR 8">STAR 8</option>
                                    <option value="STATEMAN">STATEMAN</option>
                                    <option value="STEARNS">STEARNS</option>
                                    <option value="STEINBOCK">STEINBOCK</option>
                                    <option value="STERY">STERY</option>
                                    <option value="STEVENS-DURYEA">STEVENS-DURYEA</option>
                                    <option value="STEWART WARNER">STEWART WARNER</option>
                                    <option value="STEYR">STEYR</option>
                                    <option value="STEYR-PUCH">STEYR-PUCH</option>
                                    <option value="STEYR-PUCH">STEYR-PUCH</option>
                                    <option value="STIE">STIE</option>
                                    <option value="STILL">STILL</option>
                                    <option value="STIMULA">STIMULA</option>
                                    <option value="STOEWER">STOEWER</option>
                                    <option value="STRADA">STRADA</option>
                                    <option value="STRAKER-SQUIRE">STRAKER-SQUIRE</option>
                                    <option value="STRASSMAYR">STRASSMAYR</option>
                                    <option value="STUDEBAKER">STUDEBAKER</option>
                                    <option value="STUTZ">STUTZ</option>
                                    <option value="SUBARU">SUBARU</option>
                                    <option value="SUGICO">SUGICO</option>
                                    <option value="SUMITOMO">SUMITOMO</option>
                                    <option value="SUMITOMO YALE">SUMITOMO YALE</option>
                                    <option value="SUMOTA">SUMOTA</option>
                                    <option value="SUMSUNG">SUMSUNG</option>
                                    <option value="SUN">SUN</option>
                                    <option value="SUNBEAM">SUNBEAM</option>
                                    <option value="SUNBEAM">SUNBEAM</option>
                                    <option value="SUNCHIRO">SUNCHIRO</option>
                                    <option value="SUNLONG">SUNLONG</option>
                                    <option value="SUNNY">SUNNY</option>
                                    <option value="SUNRA">SUNRA</option>
                                    <option value="SUNSUKI">SUNSUKI</option>
                                    <option value="SUNTEC">SUNTEC</option>
                                    <option value="SUNWARD">SUNWARD</option>
                                    <option value="SUNYONG MUSSO">SUNYONG MUSSO</option>
                                    <option value="SUPER-V">SUPER-V</option>
                                    <option value="SUZUE">SUZUE</option>
                                    <option value="SUZUKI">SUZUKI</option>
                                    <option value="SWALLOW">SWALLOW</option>
                                    <option value="SWAP">SWAP</option>
                                    <option value="SWIFT">SWIFT</option>
                                    <option value="SWLTD">SWLTD</option>
                                    <option value="SYM">SYM</option>
                                    <option value="SYRENA">SYRENA</option>
                                    <option value="T-BIKE">T-BIKE</option>
                                    <option value="T-KING">T-KING</option>
                                    <option value="T-KING">T-KING</option>
                                    <option value="T-UNITED">T-UNITED</option>
                                    <option value="TACOM">TACOM</option>
                                    <option value="TACTOR FILLA">TACTOR FILLA</option>
                                    <option value="TADANO">TADANO</option>
                                    <option value="TADANO FAUN">TADANO FAUN</option>
                                    <option value="TAI SHAN">TAI SHAN</option>
                                    <option value="TAIHENG">TAIHENG</option>
                                    <option value="TAIKYOKU">TAIKYOKU</option>
                                    <option value="TAISON">TAISON</option>
                                    <option value="TAITAN">TAITAN</option>
                                    <option value="TAIXING SANDI">TAIXING SANDI</option>
                                    <option value="TAIZHOU WANGPAI">TAIZHOU WANGPAI</option>
                                    <option value="TAKAGI">TAKAGI</option>
                                    <option value="TAKEDA">TAKEDA</option>
                                    <option value="TAKEUCHI">TAKEUCHI</option>
                                    <option value="TAKOMA">TAKOMA</option>
                                    <option value="TALAYTHONG">TALAYTHONG</option>
                                    <option value="TALBERT">TALBERT</option>
                                    <option value="TALBOT">TALBOT</option>
                                    <option value="TAMCO">TAMCO</option>
                                    <option value="TAMROCK">TAMROCK</option>
                                    <option value="TANA">TANA</option>
                                    <option value="TANAKA">TANAKA</option>
                                    <option value="TANAKA SEISAKUSY">TANAKA SEISAKUSY</option>
                                    <option value="TATA">TATA</option>
                                    <option value="TATA DAEWOO">TATA DAEWOO</option>
                                    <option value="TATRA">TATRA</option>
                                    <option value="TAUNUS">TAUNUS</option>
                                    <option value="TCH">TCH</option>
                                    <option value="TCM">TCM</option>
                                    <option value="TELEX">TELEX</option>
                                    <option value="TELSMITH">TELSMITH</option>
                                    <option value="TEMPO">TEMPO</option>
                                    <option value="TENNANT">TENNANT</option>
                                    <option value="TERBERG">TERBERG</option>
                                    <option value="TEREX">TEREX</option>
                                    <option value="TEREX O&K">TEREX O&K</option>
                                    <option value="TEREX-CHANGJLANG">TEREX-CHANGJLANG</option>
                                    <option value="TEREX-CJ">TEREX-CJ</option>
                                    <option value="TEREX-DEMAG">TEREX-DEMAG</option>
                                    <option value="TESLA">TESLA</option>
                                    <option value="TETSU">TETSU</option>
                                    <option value="THAI TUK TUK">THAI TUK TUK</option>
                                    <option value="THAIJAREAN">THAIJAREAN</option>
                                    <option value="THAILAND">THAILAND</option>
                                    <option value="THAIRUNG">THAIRUNG</option>
                                    <option value="THAISENGYONG">THAISENGYONG</option>
                                    <option value="THAISUN">THAISUN</option>
                                    <option value="THERMO KING">THERMO KING</option>
                                    <option value="THINK">THINK</option>
                                    <option value="THOMAS-FLYER">THOMAS-FLYER</option>
                                    <option value="THORNYCROFT">THORNYCROFT</option>
                                    <option value="THUKIJI">THUKIJI</option>
                                    <option value="THUNDER MOUNTAIN">THUNDER MOUNTAIN</option>
                                    <option value="THURNER">THURNER</option>
                                    <option value="THWAITES">THWAITES</option>
                                    <option value="TIANGONG">TIANGONG</option>
                                    <option value="TIGER">TIGER</option>
                                    <option value="TIMBERJACK">TIMBERJACK</option>
                                    <option value="TIMIS">TIMIS</option>
                                    <option value="TITAN">TITAN</option>
                                    <option value="TM">TM</option>
                                    <option value="TM RACING">TM RACING</option>
                                    <option value="TMC">TMC</option>
                                    <option value="TOA">TOA</option>
                                    <option value="TOEWONGWAI">TOEWONGWAI</option>
                                    <option value="TOHATSU">TOHATSU</option>
                                    <option value="TOKO">TOKO</option>
                                    <option value="TOKYO">TOKYO</option>
                                    <option value="TOKYO JUKI">TOKYO JUKI</option>
                                    <option value="TOKYO RYUKI">TOKYO RYUKI</option>
                                    <option value="TOKYO RYUKI SEIZO">TOKYO RYUKI SEIZO</option>
                                    <option value="TOKYU">TOKYU</option>
                                    <option value="TOMAS">TOMAS</option>
                                    <option value="TOMEN">TOMEN</option>
                                    <option value="TOMOS">TOMOS</option>
                                    <option value="TONGFONG">TONGFONG</option>
                                    <option value="TONGYANG">TONGYANG</option>
                                    <option value="TORNADO">TORNADO</option>
                                    <option value="TORO">TORO</option>
                                    <option value="TOTAL REPLICA">TOTAL REPLICA</option>
                                    <option value="TOWABLETRAVELTRAILER">TOWABLETRAVELTRAILER</option>
                                    <option value="TOYO">TOYO</option>
                                    <option value="TOYOPET">TOYOPET</option>
                                    <option value="TOYOSHA">TOYOSHA</option>
                                    <option value="TOYOTA">TOYOTA</option>
                                    <option value="TOYOTA LEXUS">TOYOTA LEXUS</option>
                                    <option value="TOYOTRON">TOYOTRON</option>
                                    <option value="TPM">TPM</option>
                                    <option value="TPS">TPS</option>
                                    <option value="TR">TR</option>
                                    <option value="TR PASSPORT">TR PASSPORT</option>
                                    <option value="TRABANT">TRABANT</option>
                                    <option value="TRAIL">TRAIL</option>
                                    <option value="TRAILMOBIL">TRAILMOBIL</option>
                                    <option value="TRAILMOBILE">TRAILMOBILE</option>
                                    <option value="TRERMCKINL">TRERMCKINL</option>
                                    <option value="TREX">TREX</option>
                                    <option value="TRIDENT">TRIDENT</option>
                                    <option value="TRIUMPH">TRIUMPH</option>
                                    <option value="TRIUMPH TIGER">TRIUMPH TIGER</option>
                                    <option value="TROJAN">TROJAN</option>
                                    <option value="TRUCK">TRUCK</option>
                                    <option value="TRXBUILD">TRXBUILD</option>
                                    <option value="TSUCHIYA">TSUCHIYA</option>
                                    <option value="TUCKER">TUCKER</option>
                                    <option value="TUK TUK FACTORY">TUK TUK FACTORY</option>
                                    <option value="TUK TUK FORWARDER">TUK TUK FORWARDER</option>
                                    <option value="TUKTUK">TUKTUK</option>
                                    <option value="TUKTUKJAIPETCH">TUKTUKJAIPETCH</option>
                                    <option value="TURCAT-MERY">TURCAT-MERY</option>
                                    <option value="TURNER">TURNER</option>
                                    <option value="TVR">TVR</option>
                                    <option value="TVS">TVS</option>
                                    <option value="TWINNER">TWINNER</option>
                                    <option value="TYMCO">TYMCO</option>
                                    <option value="TYPHOON">TYPHOON</option>
                                    <option value="U.T.-AKI">U.T.-AKI</option>
                                    <option value="UAZ">UAZ</option>
                                    <option value="UD">UD</option>
                                    <option value="UD TRUCK">UD TRUCK</option>
                                    <option value="UDA">UDA</option>
                                    <option value="UEUROMACH">UEUROMACH</option>
                                    <option value="ULTIMA">ULTIMA</option>
                                    <option value="UMM">UMM</option>
                                    <option value="UMTHAISUN">UMTHAISUN</option>
                                    <option value="UNIBOX">UNIBOX</option>
                                    <option value="UNIC">UNIC</option>
                                    <option value="UNICARRIERS">UNICARRIERS</option>
                                    <option value="UNION">UNION</option>
                                    <option value="UNIPOWER">UNIPOWER</option>
                                    <option value="UNIS">UNIS</option>
                                    <option value="UNIVERSAL">UNIVERSAL</option>
                                    <option value="UOTANI">UOTANI</option>
                                    <option value="UPRIGHT">UPRIGHT</option>
                                    <option value="URAL">URAL</option>
                                    <option value="URARU">URARU</option>
                                    <option value="USED CARRY CAR">USED CARRY CAR</option>
                                    <option value="USIRUS">USIRUS</option>
                                    <option value="USSR">USSR</option>
                                    <option value="UTANI">UTANI</option>
                                    <option value="V-MAX">V-MAX</option>
                                    <option value="V-TWIN">V-TWIN</option>
                                    <option value="V.M.C">V.M.C</option>
                                    <option value="V.W.">V.W.</option>
                                    <option value="VALE">VALE</option>
                                    <option value="VALIANT">VALIANT</option>
                                    <option value="VALMET">VALMET</option>
                                    <option value="VANDEN PLAS">VANDEN PLAS</option>
                                    <option value="VANHOOL">VANHOOL</option>
                                    <option value="VARETA">VARETA</option>
                                    <option value="VAUXHALL">VAUXHALL</option>
                                    <option value="VAZ">VAZ</option>
                                    <option value="VELOCETTC">VELOCETTC</option>
                                    <option value="VELOCETTE">VELOCETTE</option>
                                    <option value="VELOCIFERO">VELOCIFERO</option>
                                    <option value="VENTURI">VENTURI</option>
                                    <option value="VERMEER">VERMEER</option>
                                    <option value="VESPA">VESPA</option>
                                    <option value="VESTOR">VESTOR</option>
                                    <option value="VIBRATING ROLLER">VIBRATING ROLLER</option>
                                    <option value="VIBRATORY">VIBRATORY</option>
                                    <option value="VIBROMAX">VIBROMAX</option>
                                    <option value="VICTOR">VICTOR</option>
                                    <option value="VICTORY">VICTORY</option>
                                    <option value="VIKING">VIKING</option>
                                    <option value="VIKYNO">VIKYNO</option>
                                    <option value="VINCENET">VINCENET</option>
                                    <option value="VINOT">VINOT</option>
                                    <option value="VIVACE">VIVACE</option>
                                    <option value="VM">VM</option>
                                    <option value="VMOTO">VMOTO</option>
                                    <option value="VOEGELE">VOEGELE</option>
                                    <option value="VOEST">VOEST</option>
                                    <option value="VOGELE">VOGELE</option>
                                    <option value="VOISIN">VOISIN</option>
                                    <option value="VOLGA">VOLGA</option>
                                    <option value="VOLK">VOLK</option>
                                    <option value="VOLK BEETLE">VOLK BEETLE</option>
                                    <option value="VOLK NEW BEETLE">VOLK NEW BEETLE</option>
                                    <option value="VOLKAN">VOLKAN</option>
                                    <option value="VOLKSWAGEN">VOLKSWAGEN</option>
                                    <option value="VOLKSWAGEN BEETLE">VOLKSWAGEN BEETLE</option>
                                    <option value="VOLVO">VOLVO</option>
                                    <option value="VOVO">VOVO</option>
                                    <option value="VULCAN">VULCAN</option>
                                    <option value="W-MAXX">W-MAXX</option>
                                    <option value="WABCO">WABCO</option>
                                    <option value="WACKER">WACKER</option>
                                    <option value="WAGONEER">WAGONEER</option>
                                    <option value="WALTER">WALTER</option>
                                    <option value="WANBAO">WANBAO</option>
                                    <option value="WANDERER">WANDERER</option>
                                    <option value="WANFENG">WANFENG</option>
                                    <option value="WANXUI">WANXUI</option>
                                    <option value="WARSZAWA">WARSZAWA</option>
                                    <option value="WARTBURG">WARTBURG</option>
                                    <option value="WATANABE">WATANABE</option>
                                    <option value="WAVERLEY">WAVERLEY</option>
                                    <option value="WECHAI">WECHAI</option>
                                    <option value="WEICHAI">WEICHAI</option>
                                    <option value="WEICHAI POWER">WEICHAI POWER</option>
                                    <option value="WEIFANG HENGHAO">WEIFANG HENGHAO</option>
                                    <option value="WEIGEL">WEIGEL</option>
                                    <option value="WELVO">WELVO</option>
                                    <option value="WEST COAST CHOPPERS">WEST COAST CHOPPERS</option>
                                    <option value="WESTCOAST">WESTCOAST</option>
                                    <option value="WESTFIELD">WESTFIELD</option>
                                    <option value="WHEEL">WHEEL</option>
                                    <option value="WHITE">WHITE</option>
                                    <option value="WHITLOCK">WHITLOCK</option>
                                    <option value="WIC">WIC</option>
                                    <option value="WIGGINSLIFT">WIGGINSLIFT</option>
                                    <option value="WILLIAM">WILLIAM</option>
                                    <option value="WILLS SAINTE CLAIRE">WILLS SAINTE CLAIRE</option>
                                    <option value="WILLYS">WILLYS</option>
                                    <option value="WINBULL YAMAGUCHI">WINBULL YAMAGUCHI</option>
                                    <option value="WINGET">WINGET</option>
                                    <option value="WINTON">WINTON</option>
                                    <option value="WIRTGEN">WIRTGEN</option>
                                    <option value="WIRTGEN ROAD">WIRTGEN ROAD</option>
                                    <option value="WOLSELEY">WOLSELEY</option>
                                    <option value="WORLD">WORLD</option>
                                    <option value="WP MOTOREN">WP MOTOREN</option>
                                    <option value="WRITGEN">WRITGEN</option>
                                    <option value="WULING">WULING</option>
                                    <option value="WUXI">WUXI</option>
                                    <option value="WUYANG HONDA">WUYANG HONDA</option>
                                    <option value="XCE">XCE</option>
                                    <option value="XCMG">XCMG</option>
                                    <option value="XGMA">XGMA</option>
                                    <option value="XIAGONG">XIAGONG</option>
                                    <option value="XIALT">XIALT</option>
                                    <option value="XIAMEN">XIAMEN</option>
                                    <option value="XICHAI">XICHAI</option>
                                    <option value="XILIAN">XILIAN</option>
                                    <option value="XINCHAI">XINCHAI</option>
                                    <option value="XINCHEN">XINCHEN</option>
                                    <option value="XINFU">XINFU</option>
                                    <option value="XINGFU">XINGFU</option>
                                    <option value="XINGHI">XINGHI</option>
                                    <option value="XINLING">XINLING</option>
                                    <option value="XINRI">XINRI</option>
                                    <option value="XPLORE">XPLORE</option>
                                    <option value="XUZHOU">XUZHOU</option>
                                    <option value="XZKAT">XZKAT</option>
                                    <option value="YADEA">YADEA</option>
                                    <option value="YALE">YALE</option>
                                    <option value="YAM">YAM</option>
                                    <option value="YAMA">YAMA</option>
                                    <option value="YAMAGUCHI">YAMAGUCHI</option>
                                    <option value="YAMAHA">YAMAHA</option>
                                    <option value="YANGCHAI">YANGCHAI</option>
                                    <option value="YANGTSE">YANGTSE</option>
                                    <option value="YANMAR">YANMAR</option>
                                    <option value="YANMAT">YANMAT</option>
                                    <option value="YANMER">YANMER</option>
                                    <option value="YARDHASLER">YARDHASLER</option>
                                    <option value="YAVA-CZ">YAVA-CZ</option>
                                    <option value="YAXING">YAXING</option>
                                    <option value="YBM">YBM</option>
                                    <option value="YEAL">YEAL</option>
                                    <option value="YEMGO">YEMGO</option>
                                    <option value="YES">YES</option>
                                    <option value="YIN LONG">YIN LONG</option>
                                    <option value="YINGANG">YINGANG</option>
                                    <option value="YINGYUE">YINGYUE</option>
                                    <option value="YINXIANG">YINXIANG</option>
                                    <option value="YISHAN">YISHAN</option>
                                    <option value="YIYING">YIYING</option>
                                    <option value="YLN">YLN</option>
                                    <option value="YORK">YORK</option>
                                    <option value="YOUNG MAN">YOUNG MAN</option>
                                    <option value="YOUNG MAN NEOPLAN">YOUNG MAN NEOPLAN</option>
                                    <option value="YTO">YTO</option>
                                    <option value="YUAN SHAN">YUAN SHAN</option>
                                    <option value="YUCHAI">YUCHAI</option>
                                    <option value="YUGO">YUGO</option>
                                    <option value="YULE">YULE</option>
                                    <option value="YUNNEI">YUNNEI</option>
                                    <option value="YUSOKI">YUSOKI</option>
                                    <option value="YUTAKA">YUTAKA</option>
                                    <option value="YUTANI">YUTANI</option>
                                    <option value="YUTONG">YUTONG</option>
                                    <option value="ZAFIRA">ZAFIRA</option>
                                    <option value="ZAGATO">ZAGATO</option>
                                    <option value="ZAZ">ZAZ</option>
                                    <option value="ZCZ">ZCZ</option>
                                    <option value="ZEAP">ZEAP</option>
                                    <option value="ZEN-NOH">ZEN-NOH</option>
                                    <option value="ZERO">ZERO</option>
                                    <option value="ZERO ENGINEERING">ZERO ENGINEERING</option>
                                    <option value="ZETOR">ZETOR</option>
                                    <option value="ZETTLEMAYER">ZETTLEMAYER</option>
                                    <option value="ZEV">ZEV</option>
                                    <option value="ZHENG TAI">ZHENG TAI</option>
                                    <option value="ZHONG XIN">ZHONG XIN</option>
                                    <option value="ZHONGTONG">ZHONGTONG</option>
                                    <option value="ZHONGYU">ZHONGYU</option>
                                    <option value="ZIEMAN">ZIEMAN</option>
                                    <option value="ZIL">ZIL</option>
                                    <option value="ZONDA">ZONDA</option>
                                    <option value="ZONESHEN">ZONESHEN</option>
                                    <option value="ZONG SHEN">ZONG SHEN</option>
                                    <option value="ZOOMLION">ZOOMLION</option>
                                    <option value="ZOOMLION PUYUAN">ZOOMLION PUYUAN</option>
                                    <option value="ZOT">ZOT</option>
                                    <option value="ZOTYE">ZOTYE</option>
                                    <option value="ZTS">ZTS</option>
                                    <option value="ZUNDAPP">ZUNDAPP</option>
                                    <option value="ZUNDUS">ZUNDUS</option>
                                    <option value="ZUST">ZUST</option>
                                    <option value="ZX AUTO">ZX AUTO</option>
                                    <option value="คาดีแล็ก">คาดีแล็ก</option>
                                    <option value="ชินนเรศ">ชินนเรศ</option>
                                    <option value="ชิโนทรัค">ชิโนทรัค</option>
                                    <option value="ตุ๊ก-ตุ๊ก ใจเพชร">ตุ๊ก-ตุ๊ก ใจเพชร</option>
                                    <option value="ทรักเรกเกอร์">ทรักเรกเกอร์</option>
                                    <option value="ทะเลทอง">ทะเลทอง</option>
                                    <option value="บูอิค">บูอิค</option>
                                    <option value="พนัส">พนัส</option>
                                    <option value="พลสิทธิ์ ตุ๊ก-ตุ๊ก">พลสิทธิ์ ตุ๊ก-ตุ๊ก</option>
                                    <option value="ยูราล">ยูราล</option>
                                    <option value="สิงห์ชัย">สิงห์ชัย</option>
                                    <option value="อารีรัตน์">อารีรัตน์</option>
                                    <option value="อู่ซุ่นชัย">อู่ซุ่นชัย</option>
                                    <option value="อู่ฮวดการช่าง">อู่ฮวดการช่าง</option>
                                    <option value="เกษตรชัย">เกษตรชัย</option>
                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="register_type">ประเภทรถ</label>
                                <select name=register_type id="register_type"
                                    class="select2 form-control form-control-sm">
                                    <option value="0">ไม่มีข้อมูลประเภทและชนิดรถ</option>
                                    <option value="1000">รถโดยสารไมได้ระบุมาตรฐานรถและประเภทการขนส่ง</option>
                                    <option value="1101">รถโดยสาร มาตรฐาน 1 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1111">รถโดยสาร มาตรฐาน 1 ก ส่วนบุคคล</option>
                                    <option value="1121">รถโดยสาร มาตรฐาน 1 ก ไม่ประจำทาง</option>
                                    <option value="1131">รถโดยสาร มาตรฐาน 1 ก ประจำทาง</option>
                                    <option value="1102">รถโดยสาร มาตรฐาน 1 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1112">รถโดยสาร มาตรฐาน 1 ข ส่วนบุคคล</option>
                                    <option value="1122">รถโดยสาร มาตรฐาน 1 ข ไม่ประจำทาง</option>
                                    <option value="1132">รถโดยสาร มาตรฐาน 1 ข ประจำทาง</option>
                                    <option value="1201">รถโดยสาร มาตรฐาน 2 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1211">รถโดยสาร มาตรฐาน 2 ก ส่วนบุคคล</option>
                                    <option value="1221">รถโดยสาร มาตรฐาน 2 ก ไม่ประจำทาง</option>
                                    <option value="1231">รถโดยสาร มาตรฐาน 2 ก ประจำทาง</option>
                                    <option value="1202">รถโดยสาร มาตรฐาน 2 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1212">รถโดยสาร มาตรฐาน 2 ข ส่วนบุคคล</option>
                                    <option value="1222">รถโดยสาร มาตรฐาน 2 ข ไม่ประจำทาง</option>
                                    <option value="1232">รถโดยสาร มาตรฐาน 2 ข ประจำทาง</option>
                                    <option value="1203">รถโดยสาร มาตรฐาน 2 ค ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1213">รถโดยสาร มาตรฐาน 2 ค ส่วนบุคคล</option>
                                    <option value="1223">รถโดยสาร มาตรฐาน 2 ค ไม่ประจำทาง</option>
                                    <option value="1233">รถโดยสาร มาตรฐาน 2 ค ประจำทาง</option>
                                    <option value="1204">รถโดยสาร มาตรฐาน 2 ง ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1214">รถโดยสาร มาตรฐาน 2 ง ส่วนบุคคล</option>
                                    <option value="1224">รถโดยสาร มาตรฐาน 2 ง ไม่ประจำทาง</option>
                                    <option value="1234">รถโดยสาร มาตรฐาน 2 ง ประจำทาง</option>
                                    <option value="1205">รถโดยสาร มาตรฐาน 2 จ ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1215">รถโดยสาร มาตรฐาน 2 จ ส่วนบุคคล</option>
                                    <option value="1225">รถโดยสาร มาตรฐาน 2 จ ไม่ประจำทาง</option>
                                    <option value="1235">รถโดยสาร มาตรฐาน 2 จ ประจำทาง</option>
                                    <option value="1301">รถโดยสาร มาตรฐาน 3 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1311">รถโดยสาร มาตรฐาน 3 ก ส่วนบุคคล</option>
                                    <option value="1321">รถโดยสาร มาตรฐาน 3 ก ไม่ประจำทาง</option>
                                    <option value="1331">รถโดยสาร มาตรฐาน 3 ก ประจำทาง</option>
                                    <option value="1302">รถโดยสาร มาตรฐาน 3 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1312">รถโดยสาร มาตรฐาน 3 ข ส่วนบุคคล</option>
                                    <option value="1322">รถโดยสาร มาตรฐาน 3 ข ไม่ประจำทาง</option>
                                    <option value="1332">รถโดยสาร มาตรฐาน 3 ข ประจำทาง</option>
                                    <option value="1303">รถโดยสาร มาตรฐาน 3 ค ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1313">รถโดยสาร มาตรฐาน 3 ค ส่วนบุคคล</option>
                                    <option value="1323">รถโดยสาร มาตรฐาน 3 ค ไม่ประจำทาง</option>
                                    <option value="1333">รถโดยสาร มาตรฐาน 3 ค ประจำทาง</option>
                                    <option value="1304">รถโดยสาร มาตรฐาน 3 ง ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1314">รถโดยสาร มาตรฐาน 3 ง ส่วนบุคคล</option>
                                    <option value="1324">รถโดยสาร มาตรฐาน 3 ง ไม่ประจำทาง</option>
                                    <option value="1334">รถโดยสาร มาตรฐาน 3 ง ประจำทาง</option>
                                    <option value="1305">รถโดยสาร มาตรฐาน 3 จ ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1315">รถโดยสาร มาตรฐาน 3 จ ส่วนบุคคล</option>
                                    <option value="1325">รถโดยสาร มาตรฐาน 3 จ ไม่ประจำทาง</option>
                                    <option value="1335">รถโดยสาร มาตรฐาน 3 จ ประจำทาง</option>
                                    <option value="1306">รถโดยสาร มาตรฐาน 3 ฉ ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1316">รถโดยสาร มาตรฐาน 3 ฉ ส่วนบุคคล</option>
                                    <option value="1326">รถโดยสาร มาตรฐาน 3 ฉ ไม่ประจำทาง</option>
                                    <option value="1336">รถโดยสาร มาตรฐาน 3 ฉ ประจำทาง</option>
                                    <option value="1401">รถโดยสาร มาตรฐาน 4 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1411">รถโดยสาร มาตรฐาน 4 ก ส่วนบุคคล</option>
                                    <option value="1421">รถโดยสาร มาตรฐาน 4 ก ไม่ประจำทาง</option>
                                    <option value="1431">รถโดยสาร มาตรฐาน 4 ก ประจำทาง</option>
                                    <option value="1402">รถโดยสาร มาตรฐาน 4 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1412">รถโดยสาร มาตรฐาน 4 ข ส่วนบุคคล</option>
                                    <option value="1422">รถโดยสาร มาตรฐาน 4 ข ไม่ประจำทาง</option>
                                    <option value="1432">รถโดยสาร มาตรฐาน 4 ข ประจำทาง</option>
                                    <option value="1403">รถโดยสาร มาตรฐาน 4 ค ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1413">รถโดยสาร มาตรฐาน 4 ค ส่วนบุคคล</option>
                                    <option value="1423">รถโดยสาร มาตรฐาน 4 ค ไม่ประจำทาง</option>
                                    <option value="1433">รถโดยสาร มาตรฐาน 4 ค ประจำทาง</option>
                                    <option value="1404">รถโดยสาร มาตรฐาน 4 ง ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1414">รถโดยสาร มาตรฐาน 4 ง ส่วนบุคคล</option>
                                    <option value="1424">รถโดยสาร มาตรฐาน 4 ง ไม่ประจำทาง</option>
                                    <option value="1434">รถโดยสาร มาตรฐาน 4 ง ประจำทาง</option>
                                    <option value="1405">รถโดยสาร มาตรฐาน 4 จ ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1415">รถโดยสาร มาตรฐาน 4 จ ส่วนบุคคล</option>
                                    <option value="1425">รถโดยสาร มาตรฐาน 4 จ ไม่ประจำทาง</option>
                                    <option value="1435">รถโดยสาร มาตรฐาน 4 จ ประจำทาง</option>
                                    <option value="1406">รถโดยสาร มาตรฐาน 4 ฉ ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1416">รถโดยสาร มาตรฐาน 4 ฉ ส่วนบุคคล</option>
                                    <option value="1426">รถโดยสาร มาตรฐาน 4 ฉ ไม่ประจำทาง</option>
                                    <option value="1436">รถโดยสาร มาตรฐาน 4 ฉ ประจำทาง</option>
                                    <option value="1501">รถโดยสาร มาตรฐาน 5 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1511">รถโดยสาร มาตรฐาน 5 ก ส่วนบุคคล</option>
                                    <option value="1521">รถโดยสาร มาตรฐาน 5 ก ไม่ประจำทาง</option>
                                    <option value="1531">รถโดยสาร มาตรฐาน 5 ก ประจำทาง</option>
                                    <option value="1502">รถโดยสาร มาตรฐาน 5 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1512">รถโดยสาร มาตรฐาน 5 ข ส่วนบุคคล</option>
                                    <option value="1522">รถโดยสาร มาตรฐาน 5 ข ไม่ประจำทาง</option>
                                    <option value="1532">รถโดยสาร มาตรฐาน 5 ข ประจำทาง</option>
                                    <option value="1601">รถโดยสาร มาตรฐาน 6 ก ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1611">รถโดยสาร มาตรฐาน 6 ก ส่วนบุคคล</option>
                                    <option value="1621">รถโดยสาร มาตรฐาน 6 ก ไม่ประจำทาง</option>
                                    <option value="1631">รถโดยสาร มาตรฐาน 6 ก ประจำทาง</option>
                                    <option value="1602">รถโดยสาร มาตรฐาน 6 ข ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1612">รถโดยสาร มาตรฐาน 6 ข ส่วนบุคคล</option>
                                    <option value="1622">รถโดยสาร มาตรฐาน 6 ข ไม่ประจำทาง</option>
                                    <option value="1632">รถโดยสาร มาตรฐาน 6 ข ประจำทาง</option>
                                    <option value="1700">รถโดยสาร มาตรฐาน 7 ไม่ได้ระบุประเภทการขนส่ง</option>
                                    <option value="1710">รถโดยสาร มาตรฐาน 7 ส่วนบุคคล</option>
                                    <option value="1720">รถโดยสาร มาตรฐาน 7 ไม่ประจำทาง</option>
                                    <option value="2000">รถบรรทุก ไม่ได้ระบุลักษณะและประเภทรถ</option>
                                    <option value="2100">รถบรรทุก ลักษณะ 1 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2110">รถบรรทุก ลักษณะ 1 ส่วนบุคคล</option>
                                    <option value="2120" selected>รถบรรทุก ลักษณะ 1 ไม่ประจำทาง</option>
                                    <option value="2200">รถบรรทุก ลักษณะ 2 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2210">รถบรรทุก ลักษณะ 2 ส่วนบุคคล</option>
                                    <option value="2220">รถบรรทุก ลักษณะ 2 ไม่ประจำทาง</option>
                                    <option value="2300">รถบรรทุก ลักษณะ 3 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2310">รถบรรทุก ลักษณะ 3 ส่วนบุคคล</option>
                                    <option value="2320">รถบรรทุก ลักษณะ 3 ไม่ประจำทาง</option>
                                    <option value="2400">รถบรรทุก ลักษณะ 4 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2410">รถบรรทุก ลักษณะ 4 ส่วนบุคคล</option>
                                    <option value="2420">รถบรรทุก ลักษณะ 4 ไม่ประจำทาง</option>
                                    <option value="2500">รถบรรทุก ลักษณะ 5 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2510">รถบรรทุก ลักษณะ 5 ส่วนบุคคล</option>
                                    <option value="2520">รถบรรทุก ลักษณะ 5 ไม่ประจำทาง</option>
                                    <option value="2600">รถบรรทุก ลักษณะ 6 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2610">รถบรรทุก ลักษณะ 6 ส่วนบุคคล</option>
                                    <option value="2620">รถบรรทุก ลักษณะ 6 ไม่ประจำทาง</option>
                                    <option value="2700">รถบรรทุก ลักษณะ 7 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2710">รถบรรทุก ลักษณะ 7 ส่วนบุคคล</option>
                                    <option value="2720">รถบรรทุก ลักษณะ 7 ไม่ประจำทาง</option>
                                    <option value="2800">รถบรรทุก ลักษณะ 8 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2810">รถบรรทุก ลักษณะ 8 ส่วนบุคคล</option>
                                    <option value="2820">รถบรรทุก ลักษณะ 8 ไม่ประจำทาง</option>
                                    <option value="2900">รถบรรทุก ลักษณะ 9 ไม่ได้ระบุประเภทรถ</option>
                                    <option value="2910">รถบรรทุก ลักษณะ 9 ส่วนบุคคล</option>
                                    <option value="2920">รถบรรทุก ลักษณะ 9 ไม่ประจำทาง</option>
                                    <option value="3000">รถยนต์ ไม่ระบุประเภทรถ</option>
                                    <option value="3010">รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option>
                                    <option value="3011">รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option>
                                    <option value="3012">รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option>
                                    <option value="3013">รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option>
                                    <option value="3014">รถยนต์นั่งส่วนบุคคลไม่เกินเจ็ดคน (รย.1)</option>
                                    <option value="3020">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                                    <option value="3021">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                                    <option value="3022">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                                    <option value="3023">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                                    <option value="3024">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                                    <option value="3025">รถยนต์นั่งส่วนบุคคลเกินเจ็ดคน (รย.2)</option>
                                    <option value="3030">รถยนต์บรรทุกส่วนบุคคล (รย.3)</option>
                                    <option value="3031">รถยนต์บรรทุกส่วนบุคคล (รย.ร)</option>
                                    <option value="3032">รถยนต์บรรทุกส่วนบุคคล (รย.ร)</option>
                                    <option value="3033">รถยนต์บรรทุกส่วนบุคคล (รย.ร)</option>
                                    <option value="3040">รถยนต์สามล้อส่วนบุคคล (รย.4)</option>
                                    <option value="3041">รถยนต์สามล้อส่วนบุคคล (รย.4)</option>
                                    <option value="3042">รถยนต์สามล้อส่วนบุคคล (รย.4)</option>
                                    <option value="3043">รถยนต์สามล้อส่วนบุคคล (รย.4)</option>
                                    <option value="3044">รถยนต์สามล้อส่วนบุคคล (รย.4)</option>
                                    <option value="3050">รถยนต์รับจ้างระหว่างจังหวัด (รย.ร)</option>
                                    <option value="3060">รถยนต์รับจ้างบรรทุกคนโดยสารไม่เกินเจ็ดคน (รย.6)</option>
                                    <option value="3070">รถยนต์สี่ล้อเล็กรับจ้าง (รย.7)</option>
                                    <option value="3080">รถยนต์รับจ้างสามล้อ (รย.8)</option>
                                    <option value="3090">รถยนต์บริการธุรกิจ (รย.9)</option>
                                    <option value="3100">รถยนต์บริการทัศนาจร (รย.10)</option>
                                    <option value="3110">รถยนต์บริการให้เช่า (รย.11)</option>
                                    <option value="4120">รถจักรยานยนต์ (รย.12)</option>
                                    <option value="3130">รถแทรกเตอร์ (รย.13)</option>
                                    <option value="3140">รถบดถนน (รย.14)</option>
                                    <option value="3150">รถใช้งานเกษตรกรรม (รย.15)</option>
                                    <option value="3160">รถพ่วง (รย.16)</option>
                                    <option value="4170">รถจักรยานยนต์สาธารณะ (รย.17)</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="amper">เลขทะเบียนรถ</label>
                                <div class="form-inline">
                                    <input type="text" class="form-control  form-control-sm col" name="amper" id="amper"
                                        value="">
                                    &nbsp;
                                    <select name=province2 id="province2"
                                        class="select2 form-control  form-control-sm col">
                                        <option value="" selected="selected">เลือกจังหวัด</option>
                                        <?php 
                  $sql_province="SELECT * FROM province_code order by code asc";
                  $rs_province=$conn->query($sql_province);
                  while($row_province=$rs_province->fetch_assoc()){
                  ?>
                                        <option value="<?= $row_province['code'] ?>"><?= $row_province['name']; ?>
                                        </option>
                                        <?php
                    } 
                  ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="car_approve_id">เครื่องรุ่น</label>
                                <select name="car_approve_id" id="car_approve_id"
                                    class="select2 form-control  form-control-sm">
                                    <option value="T333">T333</option>
                                    <option value="AW">AW</option>
                                    <option value="VT">VT900</option>
                                    <option value="VT(Box)" selected>VT900(Box)</option>
                                    <option value="VT(U)">VT900(U)</option>
                                    <option value="VT(Box)(U)">VT900(Box)(U)</option>
                                    <option value="VT(A)">VT900(A)</option>
                                    <option value="VT(Box)(A)">VT900(Box)(A)</option>
                                    <option value="T1">T1</option>
                                    <option value="GT06E(Box)">GT06E(Box)</option>
                                    <option value="GT06E">GT06E</option>
                                    <option value="fm11">Teltonika FM1100</option>
                                    <option value="ts107">TS107</option>
                                    <option value="tk103">TK103</option>
                                    <option value="MVT380">MVT380</option>
                                    <option value="VT300">VT300</option>
                                    <option value="GM901">GM901</option>
                                    <option value="ST901">ST901</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="imeiall">SIM</label>
                                <input name="sim" class="form-control  form-control-sm" type="text" id="sim" value=""
                                    size="11" placeholder="00000000000">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="imeiall">IMEI</label>
                                <input name="imei" class="form-control  form-control-sm" type="text" id="imei" value=""
                                    size="30" placeholder="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="date">วันที่ติดตั้ง</label>
                                <div class="form-inline">
                                    วันที่ &nbsp;
                                    <select name="date" id="date" class="form-control  form-control-sm">
                                        <option value='<?php echo date("j"); ?>' selected="selected">
                                            <?php echo date("j"); ?>
                                        </option>
                                        <option value=1>1</option>
                                        <option value=2>2</option>
                                        <option value=3>3</option>
                                        <option value=4>4</option>
                                        <option value=5>5</option>
                                        <option value=6>6</option>
                                        <option value=7>7</option>
                                        <option value=8>8</option>
                                        <option value=9>9</option>
                                        <option value=10>10</option>
                                        <option value=11>11</option>
                                        <option value=12>12</option>
                                        <option value=13>13</option>
                                        <option value=14>14</option>
                                        <option value=15>15</option>
                                        <option value=16>16</option>
                                        <option value=17>17</option>
                                        <option value=18>18</option>
                                        <option value=19>19</option>
                                        <option value=20>20</option>
                                        <option value=21>21</option>
                                        <option value=22>22</option>
                                        <option value=23>23</option>
                                        <option value=24>24</option>
                                        <option value=25>25</option>
                                        <option value=26>26</option>
                                        <option value=27>27</option>
                                        <option value=28>28</option>
                                        <option value=29>29</option>
                                        <option value=30>30</option>
                                        <option value=31>31</option>
                                    </select> &nbsp;
                                    เดือน &nbsp;
                                    <select name="sex" id="month" class="form-control  form-control-sm">
                                        <option value="
                    <?php echo "" .monthThai('$strDate'); ?>" selected="selected">
                                            <?php echo "".monthThai('$strDate');
                      ?>
                                        </option>
                                        <option value="มกราคม">มกราคม</option>
                                        <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                                        <option value="มีนาคม">มีนาคม</option>
                                        <option value="เมษายน">เมษายน</option>
                                        <option value="พฤษภาคม">พฤษภาคม</option>
                                        <option value="มิถุนายน">มิถุนายน</option>
                                        <option value="กรกฎาคม">กรกฎาคม</option>
                                        <option value="สิงหาคม">สิงหาคม</option>
                                        <option value="กันยายน">กันยายน</option>
                                        <option value="ตุลาคม">ตุลาคม</option>
                                        <option value="พฤศจิกายน">พฤศจิกายน</option>
                                        <option value="ธันวาคม">ธันวาคม</option>
                                    </select> &nbsp;
                                    พ.ศ. &nbsp;
                                    <input name="year" type="text" id="year" class="form-control  form-control-sm"
                                        value="<?php echo date('Y')+543; ?>" size="5">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="email">Server</label>
                                <select name="email" id="email" class="select2 form-control  form-control-sm">
                                    <option value="sv1.greenboxgps.com">ตาจบ 2</option>
                                    <option value="greenboxsv3.com">ตาจบ</option>
                                    <option value="greensv1.com">หาร</option>
                                    <option value="greensv2.com">ตี๋</option>
                                    <option value="greenboxsv.com">ก๊อช</option>
                                    <option value="gpsgreenbox.com">greenbox</option>
                                    <option value="s1.gpsgreenbox.com" selected>S1</option>
                                    <option value="s2.gpsgreenbox.com">S2</option>
                                    <option value="s3.gpsgreenbox.com">S3</option>
                                    <option value="s4.gpsgreenbox.com">S4</option>
                                    <option value="s5.gpsgreenbox.com">S5</option>
                                    <option value="sv2.greenboxgps.com">New Greenbox sv2</option>

                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="name">วันที่ครบกำหนดต่อภาษี</label>
                                <input name="duetax" type="text" id="duetax" value="" size="50"
                                    placeholder="เลือกวันที่ครบกำหนดต่อภาษี" class="form-control form-control-sm"
                                    required readonly>
                            </div>
                        </div>
                        <hr style="border-color:green;">
                        <div class="row">
                            <div class="form-check form-group col-md-2">
                                <label>
                                    <input type="radio" name="user_existing" id="user_existing" value="user_old"
                                        onclick="checkUser(this.value)" checked> <span class="label-text">USER
                                        ที่มีอยู่แล้ว</span>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="select_user">User <font class="t-red">(ย่อย ที่มีอยู่แล้ว)</font></label>
                                <select name="select_user" id="select_user" class="select2 form-control form-control-sm"
                                    onchange="checkselectUser(this.value)">
                                    <option>เลือก USER</option>
                                    <?php
                                    $sql_custo = "SELECT * FROM customer";
                                    $re_cus = $conn->query($sql_custo);
                                    while($row_cus = $re_cus->fetch_assoc()){
                                  ?>
                                    <option value="<?= $row_cus['cus_id'] ?>">
                                        <?= $row_cus['cus_user'] .' | '. $row_cus['cus_name'] ?></option>

                                    <?php
                                 }
                              ?>
                                </select>
                            </div>
                        </div>
                        <hr style="border-color:green;">
                        <div class="row">
                            <div class="form-check form-group col-md-2">
                                <label>
                                    <input type="radio" name="user_existing" value="user_new"
                                        onclick="checkUser(this.value)"> <span class="label-text">USER
                                        ใหม่</span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="phone">User <font class="t-red">(ย่อย)</font> </label>
                                <input name="phone" type="text" id="phone" value="" size="20"
                                    placeholder="username ย่อย" class="form-control form-control-sm" readonly="true">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="main_user">User <font class="t-red">(หลัก)</font> </label>
                                <input name="main_user" type="text" id="main_user" value="" size="20"
                                    placeholder="username หลัก" class="form-control form-control-sm" readonly="true">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="name">ชื่อผู้ประกอบการณ์</label>
                                <input name="name" type="text" id="name" value="" size="50"
                                    placeholder="ชื่อผู้ประกอบการณ์" class="form-control form-control-sm" required
                                    readonly="true">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="contrack">ที่อยู่</label>
                                <input name="contrack" type="text" id="contrack" value="" size="20"
                                    placeholder="ที่อยู่ส่งเอกสาร" class="form-control form-control-sm" required
                                    readonly="true">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="tel_contact">เบอร์โทรติดต่อ</label>
                                <input name="tel_contact" type="text" id="tel_contact" value="" size="50"
                                    placeholder="เบอร์โทรติดต่อ" class="form-control form-control-sm" required
                                    readonly="true">
                            </div>
                        </div>
                        <hr style="border-color:green;">
                  
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="education">ชื่อคนเซ็น + ตำแหน่ง</label>
                                <div class="form-inline">
                                    <select name=education id="education" class="form-control form-control-sm  col">
                                        <option value="นางสาวกันตณา ยี่จันทึก" selected="selected">นา</option>
                                        <option value="นายรัตนพล ธนะโสภณ">เปิ้ล</option>
                                        <option value="นายวีรวิขญ์ จิตรคูณเศรษฐ์">wit</option>
                                        <option value="ว่าที่ ร.ต. เจษฎา  พรหมกุลจันทร์">เจษฎา ระยอง</option>
                                        <option value="นายโชคชัย ไชยพิพัฒนขจร">นายโชคชัย ไชยพิพัฒนขจร (Dealer จ.เลย)
                                        </option>
                                        <option value="นาย ณัฐพงษ์ แสนจำลา">นาย ณัฐพงษ์ แสนจำลา (Dealer จ.101)</option>
                                        <option value="นาย ธนากร นิ่มวิไลย">นาย ธนากร นิ่มวิไลย (Dealer จ.ชัยนาท)
                                        </option>
                                        <option value="นาย ทวี ลิ้มเจริญ">นาย ทวี ลิ้มเจริญ (Dealer จ.ชัยนาท2)</option>
                                        <option value="นาย เพชร ทองเฟื้อง">นาย เพชร ทองเฟื้อง (Dealer จ.ระยอง)</option>
                                    </select>
                                    &nbsp;
                                    <select name=work class="form-control form-control-sm col">
                                        <option value="กรรมการ">กรรมการ</option>
                                        <option value="Service Area Manager">Service Area Manager</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- ปิด body-card -->
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-4">
                                <a href="?p=main_admin"><button type="button" class="btn btn-warning" name="button"
                                        onclick=""> <i class="fas fa-angle-left"></i> กลับหน้ารายการ</button></a>
                            </div>
                            <div class="col-4 text-center">
                                <input name="age" type="text" id="age" value="<?php echo date("m"); ?>" size="5" hidden>
                                <button type="submit" class="btn btn-success" name="button">บันทึก</button>
                                <button style="text-align: left;" type="reset" class="btn btn-danger"
                                    name="button">เคลีย</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
            <script src="vendor/select2/js/select2.min.js"></script>
            <script src="js\app\add_member.js"></script>
            <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
            </script>
            <script language="javascript">
            function check() {
                if (document.checkForm.user_name.value == "") {
                    alert("กรุณากรอกเลขคัดซีด้วยครับ");
                    document.checkForm.user_name.focus();
                    return false;
                }
                if (document.checkForm.amper.value == "") {
                    alert("กรุณากรอกทะเบียนรถด้วยครับ");
                    document.checkForm.amper.focus();
                    return false;
                }
                if (document.checkForm.province2.value == "") {
                    alert("กรุณาเลือกจังหวัด");
                    document.checkForm.province2.focus();
                    return false;
                }
                if (document.checkForm.simno.value == "") {
                    alert("กรอกเบอร์");
                    document.checkForm.simno.focus();
                    return false;
                }
                if (isNaN(document.checkForm.simno.value)) {
                    alert("เบอร์โทรกรอกเฉพาะตัวเลข");
                    document.checkForm.simno.focus();
                    return false;
                }

                if (document.checkForm.zipcode.value == "") {
                    alert("กรอกเบอร์ IEMI");
                    document.checkForm.zipcode.focus();
                    return false;
                }
                if (document.checkForm.phone.value == "") {
                    alert("กรอก USER ");
                    document.checkForm.phone.focus();
                    return false;
                }
                if (document.checkForm.name.value == "") {
                    alert("กรุณากรอกชื่อ-นามสกุลด้วยครับ");
                    document.checkForm.name.focus();
                    return false;
                }
                if (isNaN(document.checkForm.year.value)) {
                    alert("กรุณากรอกเฉพาะตัวเลขนะครับ");
                    document.checkForm.year.focus();
                    return false;
                } else if (document.checkForm.age.value == "") {
                    alert("กรุณากรอกอายุด้วยครับ");
                    document.checkForm.age.focus();
                    return false;
                } else if (isNaN(document.checkForm.age.value)) {
                    alert("กรุณากรอกอายุด้วยตัวเลขเท่านั้นครับ");
                    document.checkForm.age.focus();
                    return false;
                } else if (document.checkForm.province.selectedIndex == 0) {
                    alert("กรุณาระบุจังหวัดที่ท่านอยู่ด้วยครับ");
                    return false;
                } else if (isNaN(document.checkForm.zipcode.value)) {
                    alert("รหัสไปรษณีย์ต้องเป็นตัวเลขครับ");
                    document.checkForm.zipcode.focus();
                    return false;
                } else if (document.checkForm.user_name.value == "") {
                    alert("กรุณาระบุชื่อที่ท่านต้องการใช้ในการเข้าระบบด้วยครับ");
                    document.checkForm.user_name.focus();
                    return false;
                } else if (document.checkForm.pwd_name1.value == "") {
                    alert("กรุณากรอกรหัสผ่านที่ต้องการด้วยครับ");
                    document.checkForm.pwd_name1.focus();
                    return false;
                } else if (document.checkForm.pwd_name2.value == "") {
                    alert("กรุณายืนยันรหัสผ่านอีกครั้ง");
                    document.checkForm.pwd_name2.focus();
                    return false;
                } else
                    return true;
            }
            </script>
        </form>
</body>

</html>