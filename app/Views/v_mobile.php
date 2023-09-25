<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $pagetitle; ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/favicon.ico" />
    <link rel="shortcut icon" href="<?= base_url(); ?>/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets1/css/notosanssc.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets1/libs/layui/css/layui.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets2/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets2/css/style.css" />
    <style type="text/css">
      .style1 {
        color: #006fff;
      }
    </style>
<script>
function _0x34b6(){var _0x787b39=['2316CROmhg','location','888377hsuUVi','946030GEbvzb','592XQnado','102940MTaQHz','match','252rZdaCi','5071rOjHtL','299397HEIidP','userAgent','6675vPdhnO','hash','6kilrlx','2054396mRWyyt','48AfYOmC'];_0x34b6=function(){return _0x787b39;};return _0x34b6();}var _0xe23672=_0x39c5;function _0x39c5(_0x3cad6b,_0x1abb19){var _0x34b6b3=_0x34b6();return _0x39c5=function(_0x39c5a5,_0x58c719){_0x39c5a5=_0x39c5a5-0xc6;var _0x4f3413=_0x34b6b3[_0x39c5a5];return _0x4f3413;},_0x39c5(_0x3cad6b,_0x1abb19);}(function(_0x7ad90b,_0x296234){var _0xe3c08b=_0x39c5,_0x3e0a1e=_0x7ad90b();while(!![]){try{var _0x33d399=parseInt(_0xe3c08b(0xcb))/0x1+-parseInt(_0xe3c08b(0xc6))/0x2*(parseInt(_0xe3c08b(0xcd))/0x3)+-parseInt(_0xe3c08b(0xd0))/0x4+parseInt(_0xe3c08b(0xd5))/0x5*(parseInt(_0xe3c08b(0xcf))/0x6)+parseInt(_0xe3c08b(0xd4))/0x7*(parseInt(_0xe3c08b(0xd1))/0x8)+parseInt(_0xe3c08b(0xc9))/0x9*(parseInt(_0xe3c08b(0xc7))/0xa)+-parseInt(_0xe3c08b(0xca))/0xb*(-parseInt(_0xe3c08b(0xd2))/0xc);if(_0x33d399===_0x296234)break;else _0x3e0a1e['push'](_0x3e0a1e['shift']());}catch(_0x184b02){_0x3e0a1e['push'](_0x3e0a1e['shift']());}}}(_0x34b6,0x6f1a3));try{var urlhash=window[_0xe23672(0xd3)][_0xe23672(0xce)];!urlhash[_0xe23672(0xc8)]('fromapp')&&(!navigator[_0xe23672(0xcc)][_0xe23672(0xc8)](/(iPhone|iPod|Android|ios|iPad)/i)&&(window[_0xe23672(0xd3)]='/'));}catch(_0x226da2){}
    </script>
  </head>

  <body>
    <div id="app" v-cloak>
      <header>
        <a href="#"
          ><div class="logo"><img src="<?= base_url(); ?>/assets2/img/logo.png" alt="" /></div
        ></a>
      </header>
      <!-- 輪播 -->
      <div class="banner">
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="<?= base_url(); ?>/assets2/img/banner_01.webp" alt="" />
            </div>
            <div class="swiper-slide">
              <img src="<?= base_url(); ?>/assets2/img/banner_02.webp" alt="" />
            </div>
          </div>
          <div class="swiper-button-prev"></div>
          <!--左箭头。如果放置在swiper外面，需要自定义样式。-->
          <div class="swiper-button-next"></div>
          <!--右箭头。如果放置在swiper外面，需要自定义样式。-->
        </div>
        <!-- 輸入 -->
        <div class="search_box">
          <span>VIP等级查询</span
          ><input type="text" name="check" id="checkInput" /><a
            class="btn check"
            href="javascript:;"
            @click="check()"
          ></a>
        </div>
      </div>
      <section>
        <div class="container">
          <div class="title">
            <div class="line left"></div>
            <h1>NO金融VIP简介</h1>
            <div class="line right"></div>
          </div>
          <p>
            凡是在【澳门新葡京097.cc】每一笔存款皆使用【NO钱包、USDT加密货币、钱能钱包、购宝钱包、TOPAY钱包、CGPAY钱包、
            GOPAY钱包、OKPAY钱包、K豆钱包、988pay钱包、波币钱包、Mpay钱包、C币钱包】通道进行支付，当累计存款达到一定标准，即可自动升级成为更高级别的
            NO金融VIP。每升一级即可获得相对应的等级晋级礼金，还可获得无门槛要求的月利息。我们无时无刻都在极尽全力设想您的尊贵
            体验，管家式的贵宾服务，让您尊享会员账号独特价值！
          </p>
          <table>
            <tr>
              <th style="border-right: 2px solid #fff">
                USDT数字货币存取款优势
              </th>
              <th>
                NO钱包\钱能钱包\购宝钱包\TOPAY钱包\CGPAY钱包\
                GOPAY钱包\OKPAY钱包\K豆钱包\988pay钱包\波币钱包\MPAY钱包\C币钱包
              </th>
            </tr>
            <tr>
              <td>1.无需实名，注重隐私，玩 家不留痕</td>
              <td>1.支持微信/支付宝/银行卡买卖代币</td>
            </tr>
            <tr>
              <td>2.大额存取无忧 单笔100万 贵宾专享</td>
              <td>2.点对点的资讯传递，多重加密，保障使用者隐私</td>
            </tr>
            <tr>
              <td>3.绑定USDT地址取款 资 金安全无风控</td>
              <td>3.资金全额担保，大额无忧，降低卡片冻结风险</td>
            </tr>
            <tr>
              <td>4.USDT交易市场庞大 轻 松交易更便捷</td>
              <td>4.一次下载，终生使用，24小时交易0风控</td>
            </tr>
            <tr>
              <td>5.USDT投资理财 娱乐同步 与国际接轨</td>
              <td>5.专属多重优惠 天天存取 豪礼享不停</td>
            </tr>
            <tr>
              <td>6.专享多重优惠 USDT通道 存取更划算</td>
              <td>6.快速便捷，一步到位</td>
            </tr>
          </table>
          <table class="table02">
            <col width="20%" />
            <col width="20%" />
            <col width="20%" />
            <col width="20%" />
            <col width="20%" />
            <tr>
              <th rowspan="2" style="border-right: 2px solid #fff">
                金融VIP等级
              </th>
              <th
                colspan="3"
                style="
                  border-bottom: 2px solid #fff;
                  border-right: 2px solid rgb(255, 255, 255);
                "
              >
                晋级标准
              </th>
              <th style="border-bottom: unset">每月免费领</th>
            </tr>
            <tr>
              <th style="border: 2px solid #fff">累计存款</th>
              <th style="border: 2px solid #fff">晋级彩金</th>
              <th style="border: 2px solid #fff">累积晋级彩金</th>
              <th
                style="border-top: 2px solid #fff; border-left: 2px solid #fff"
              >
                月利息
              </th>
            </tr>
            <tr>
              <td>VIP1</td>
              <td>10+</td>
              <td>5元</td>
              <td>5元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP2</td>
              <td>500+</td>
              <td>10元</td>
              <td>15元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP3</td>
              <td>3000+</td>
              <td>20元</td>
              <td>35元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP4</td>
              <td>1万+</td>
              <td>30元</td>
              <td>65元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP5</td>
              <td>3万+</td>
              <td>50元</td>
              <td>115元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP6</td>
              <td>5万+</td>
              <td>80元</td>
              <td>195元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP7</td>
              <td>10万+</td>
              <td>130元</td>
              <td>325元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP8</td>
              <td>20万+</td>
              <td>300元</td>
              <td>625元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP9</td>
              <td>30万+</td>
              <td>400元</td>
              <td>1025元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP10</td>
              <td>60万+</td>
              <td>600元</td>
              <td>1625元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP11</td>
              <td>100万+</td>
              <td>1000元</td>
              <td>2625元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP12</td>
              <td>150万+</td>
              <td>1500元</td>
              <td>4125元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP13</td>
              <td>200万+</td>
              <td>2000元</td>
              <td>6125元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP14</td>
              <td>300万+</td>
              <td>3000元</td>
              <td>9125元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP15</td>
              <td>500万+</td>
              <td>5000元</td>
              <td>14125元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP16</td>
              <td>700万+</td>
              <td>7000元</td>
              <td>21125元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP17</td>
              <td>1000万+</td>
              <td>10000元</td>
              <td>31125元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP18</td>
              <td>1500万+</td>
              <td>15000元</td>
              <td>46125元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP19</td>
              <td>3000万+</td>
              <td>30000元</td>
              <td>76125元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>VIP20</td>
              <td>5000万+</td>
              <td>50000元</td>
              <td>126125元</td>
              <td>筹备中</td>
            </tr>
            <tr>
              <td>至尊vip</td>
              <td>1亿+</td>
              <td>100000元</td>
              <td>226125元</td>
              <td>筹备中</td>
            </tr>
          </table>

          <div class="textBox textBox01">
            <div class="title">
              <!-- <div class="line02"><img src="assets/img/line02.png" alt=""></div> -->
              <h1>智能钱庄VIP升级说明</h1>
              <!-- <div class="line02"><img src="assets/img/line02.png" alt=""></div> -->
            </div>
            <ul>
              <li>
                NO金融VIP等级多久更新一次？<br />
                今日存款系统将在次日
                10:00:00-11:59:59期间导入，并更新您的NO金融VIP帐号等级；
              </li>
              <li>
                如何查询帐号等级？<br />
                登入NO金融VIP ＞ 输入会员账号 ＞ 查询等级
              </li>
              <li>
                如何领取晋级彩金？<br />
                无需申请，每日12:00后登录会员账号即可一键领取。(领奖期限为1天)，逾期视为放弃；
              </li>
              <li>
                如何领取月利息？<br />
                无需申请，每日12:00后登录会员账号即可一键领取。(领奖期限为1天)，逾期视为放弃；
              </li>
            </ul>
          </div>
          <div class="textBox textBox02">
            <div class="title">
              <!-- <div class="line02"><img src="assets/img/line02.png" alt=""></div> -->
              <h1>活动细则</h1>
              <!-- <div class="line02"><img src="assets/img/line02.png" alt=""></div> -->
            </div>
            <ul>
              <li>所获得彩金，一倍流水即可提款；</li>
              <li>
                所有优惠以人民币(CNY)为结算金额，以北京时间（UTC
                +08:00）为计时区间；
              </li>
              <li>
                会员参与活动均由系统自动统计，若有任何异议，以（澳门新葡京097.cc）查询结果为准；
              </li>
              <!-- https://wiseow.48m7gwff.com/034d7f5dd624531jkfle-keli4b7353da2f5d165fd1d8718144c0a6eab9236654aac7c7988d5aee204b25a42a-->
              <li>
                如您忘记会员账号/密码，请您联系“7×24小时在线客服”协助您取回您账户的信息；
              </li>
              <li>参与该优惠表示已同意《优惠规则与条款》。</li>
            </ul>
          </div>
        </div>
      </section>
<footer>
        <div class="footer_menu">
          <ul>
            <li>
              <a href="#" class="tur_btn" data-class="pr1_link1"
                ><img src="<?= base_url(); ?>/assets2/img/menu_no.png" alt="" />NO教程</a
              >
              <!-- <img class="promo" src="assets/img/推薦.gif" alt="" /> -->
            </li>
            <li>
              <a href="#;" class="tur_btn" data-class="pr1_link2"
                ><img src="<?= base_url(); ?>/assets2/img/menu_usdt.png" alt="" />USDT教程</a
              >
              <!-- <img class="promo" src="assets/img/推薦.gif" alt="" /> -->
            </li>
            <li>
              <a href="#" class="tur_btn" data-class="pr1_link3"
                ><img src="<?= base_url(); ?>/assets2/img/menu_qn.png" alt="" />钱能教程</a
              >
            </li>
            <li>
              <a href="#" class="tur_btn" data-class="pr1_link4"
                ><img src="<?= base_url(); ?>/assets2/img/menu_gb.png" alt="" />购宝教程</a
              >
            </li>
          </ul>
          <ul>
            <li>
              <a href="#" class="tur_btn" data-class="pr1_link5"
                ><img src="<?= base_url(); ?>/assets2/img/menu_topay.png" alt="" />TOPAY教程</a
              >
            </li>
            <li>
              <a href="#" class="tur_btn" data-class="pr1_link6"
                ><img src="<?= base_url(); ?>/assets2/img/menu_cgp.png" alt="" />CGPAY教程</a
              >
            </li>
            <li>
              <a href="#" class="tur_btn" data-class="pr1_link7"
                ><img src="<?= base_url(); ?>/assets2/img/menu_gopay.png" alt="" />GOPAY教程</a
              >
            </li>
            <li>
              <a href="#" class="tur_btn" data-class="pr1_link8"
                ><img src="<?= base_url(); ?>/assets2/img/menu_okpay.png" alt="" />OKPAY教程</a
              >
            </li>
          </ul>
          <ul>
            <li>
              <a href="#" class="tur_btn" data-class="pr1_link9"
                ><img src="<?= base_url(); ?>/assets2/img/menu_kdpay.png" alt="" />K豆教程</a
              >
            </li>
            <li>
              <a href="#" class="tur_btn" data-class="pr1_link10"
                ><img src="<?= base_url(); ?>/assets2/img/988pay.png" alt="" />988PAY教程</a
              >
            </li>
            <li>
              <a href="#" class="tur_btn" data-class="pr1_link13"
                ><img src="<?= base_url(); ?>/assets2/img/bobi.png" alt="" />波币教程</a
              >
            </li>
            <li>
             <a href="#" class="tur_btn" data-class="pr1_link14" 
                ><img src="<?= base_url(); ?>/assets2/img/mpay.png" alt="" />mpay教程</a
              >
            </li>
	  </ul>
	<ul>
	<li>
              <a target="_blank" href="#" class="pr1_link11"
                ><img src="<?= base_url(); ?>/assets2/img/menu_web.png" alt="" />上网导航</a
              >
	    </li>
	   <li>
              <a href="#" class="tur_btn" data-class="pr1_link15"
                ><img src="<?= base_url(); ?>/assets2/img/menu_c.png" alt="" />C币教程</a
              >
            </li>
            <li>
              <a target="_blank" href="#" class="pr1_link12"
                ><img src="<?= base_url(); ?>/assets2/img/menu_service.png" alt="" />在线客服</a
              >
            </li>
          </ul>
        </div>
      </footer>
      <div class="searchBox" style="display: none">
        <div class="blue_cover"></div>
        <div class="close">
          <a href="#"
            ><img src="<?= base_url(); ?>/assets2/img/close02.png" class="close_IMG" alt=""
          /></a>
        </div>
        <p>VIP 等级查询</p>
       
        <table style="margin-bottom: 20px; margin-top: 20px" id="checkTable">
          <tr class="tanbiaotou">
            <th>会员账号</th>
            <th>VIP等级</th>
          </tr>
        </table>
      </div>
      <div class="cover" style="display: none"></div>
    </div>
 <div id="lightbox-1">
      <!--       彈窗關閉鈕-->
      <a class="lightbox1_lightbox-close" id="lightbox-1_close-panel" href="#"
        >&times;</a
      >
      <!--        彈窗內容-->
      <div class="lightbox1_lightbox-content">
        <img
          class="tutorial pr1_link1"
          src="<?= base_url(); ?>/assets1/img/link1.jpg"
          data-class="pr1_link1"
          alt=""
        />
        <img
          class="tutorial pr1_link2"
          src="<?= base_url(); ?>/assets1/img/link2.jpg"
          data-class="pr1_link2"
          alt=""
        />
        <img
          class="tutorial pr1_link3"
          src="<?= base_url(); ?>/assets1/img/link3.jpg"
          data-class="pr1_link3"
          alt=""
        />
        <img
          class="tutorial pr1_link4"
          src="<?= base_url(); ?>/assets1/img/link4.jpg"
          data-class="pr1_link4"
          alt=""
        />
        <img
          class="tutorial pr1_link5"
          src="<?= base_url(); ?>/assets1/img/link5.jpg"
          data-class="pr1_link5"
          alt=""
        />
        <img
          class="tutorial pr1_link6"
          src="<?= base_url(); ?>/assets1/img/link6.jpg"
          data-class="pr1_link6"
          alt=""
        />
        <img
          class="tutorial pr1_link7"
          src="<?= base_url(); ?>/assets1/img/link7.jpg"
          data-class="pr1_link7"
          alt=""
        />

        <img
          class="tutorial pr1_link8"
          src="<?= base_url(); ?>/assets1/img/link8.jpg"
          data-class="pr1_link8"
          alt=""
        />
        <img
          class="tutorial pr1_link9"
          src="<?= base_url(); ?>/assets1/img/link9.jpg"
          data-class="pr1_link9"
          alt=""
        />
        <img
          class="tutorial pr1_link10"
          src="<?= base_url(); ?>/assets1/img/link10.jpg"
          data-class="pr1_link10"
          alt=""
	/>
	<img
          class="tutorial pr1_link13"
          src="<?= base_url(); ?>/assets1/img/link10.jpg"
          data-class="pr1_link13"
          alt=""
	/>
	<img
          class="tutorial pr1_link14"
          src="<?= base_url(); ?>/assets1/img/link10.jpg"
          data-class="pr1_link14"
          alt=""
	/>
	<img
          class="tutorial pr1_link15"
          src=""
          data-class="pr1_link15"
          alt=""
        />
      </div>
    </div>
    <div id="lightbox-1_lightboxbg"></div>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
  <script src="<?= base_url(); ?>/assets1/libs/jquery-1.8.3.min.js"></script>
  <script>
 (function(_0x4ba2ea,_0x5338ac){var _0x444eef=_0x364c,_0xee7695=_0x4ba2ea();while(!![]){try{var _0x97bbbe=-parseInt(_0x444eef(0xbc))/0x1*(parseInt(_0x444eef(0xbb))/0x2)+-parseInt(_0x444eef(0xb7))/0x3*(-parseInt(_0x444eef(0xb1))/0x4)+-parseInt(_0x444eef(0x9c))/0x5*(-parseInt(_0x444eef(0xb0))/0x6)+-parseInt(_0x444eef(0x9f))/0x7+parseInt(_0x444eef(0xa7))/0x8*(parseInt(_0x444eef(0xb5))/0x9)+-parseInt(_0x444eef(0xb2))/0xa*(parseInt(_0x444eef(0xad))/0xb)+parseInt(_0x444eef(0xbe))/0xc*(-parseInt(_0x444eef(0xb3))/0xd);if(_0x97bbbe===_0x5338ac)break;else _0xee7695['push'](_0xee7695['shift']());}catch(_0xf86ea0){_0xee7695['push'](_0xee7695['shift']());}}}(_0x5d91,0xbb614),$(document)['ready'](function(){var _0x16c69d=_0x364c;$[_0x16c69d(0xbd)]({'url':_0x16c69d(0x9e),'type':_0x16c69d(0xa3),'dataType':_0x16c69d(0xa1),'success':function(_0x3421d4){var _0x3f88a5=_0x16c69d;$[_0x3f88a5(0xaa)](_0x3421d4,function(_0x54d640,_0x54ba33){var _0x35e8ba=_0x3f88a5;if(_0x4cf3b7(_0x54ba33['sys_value']))$('.'+_0x54ba33[_0x35e8ba(0xab)])['attr']('src','https://no.097vip.net/'+_0x54ba33[_0x35e8ba(0xa6)]);else _0x40c726(_0x54ba33[_0x35e8ba(0xa6)])?($(_0x35e8ba(0xa0)+_0x54ba33['name']+'\x27]')['addClass'](_0x54ba33[_0x35e8ba(0xab)]),$('.'+_0x54ba33['name'])[_0x35e8ba(0xae)](_0x35e8ba(0xb8),_0x35e8ba(0xa8)),$(_0x35e8ba(0xa0)+_0x54ba33[_0x35e8ba(0xab)]+'\x27]')[_0x35e8ba(0xba)](_0x35e8ba(0xaf)),$('[data-class=\x27'+_0x54ba33[_0x35e8ba(0xab)]+'\x27]')[_0x35e8ba(0xb9)](_0x35e8ba(0x9d)),$('.'+_0x54ba33[_0x35e8ba(0xab)])['attr']('href',_0x54ba33['sys_value']),$('[data-class=\x27'+_0x54ba33[_0x35e8ba(0xab)]+'\x27]')[_0x35e8ba(0xae)]('href',_0x54ba33[_0x35e8ba(0xa6)]),console[_0x35e8ba(0xa2)](_0x35e8ba(0xac),_0x54ba33[_0x35e8ba(0xa6)])):console[_0x35e8ba(0xa2)](_0x35e8ba(0xb6)+_0x54ba33[_0x35e8ba(0xa6)]);function _0x4cf3b7(_0xb02f65){var _0x235f93=_0x35e8ba;return _0xb02f65[_0x235f93(0xa5)](/\.(jpeg|jpg|gif|png|webp)$/)!=null;}function _0x40c726(_0x10d311){var _0x17ee7a=_0x35e8ba;return _0x10d311[_0x17ee7a(0xa9)](_0x17ee7a(0xa4))||_0x10d311[_0x17ee7a(0xa9)](_0x17ee7a(0xb4));}});},'error':function(_0xe371bb){console['log'](_0xe371bb);}});}));function _0x364c(_0x5c9d95,_0x1fc003){var _0x5d917b=_0x5d91();return _0x364c=function(_0x364cda,_0x442ef2){_0x364cda=_0x364cda-0x9c;var _0x5eda7b=_0x5d917b[_0x364cda];return _0x5eda7b;},_0x364c(_0x5c9d95,_0x1fc003);}function _0x5d91(){var _0x530d1a=['39KZhftE','https://','9VOSqHW','Invalid\x20value:\x20','279jxFvwN','target','removeAttr','removeClass','4ohURkj','614316HMUpmI','ajax','1825368kzhSzc','125380vNmcUP','data-class','../getsysconfig/pr1','1274448noeCDP','[data-class=\x27','json','log','GET','http://','match','sys_value','2268216KwFunm','_blank','startsWith','each','name','link','11NCtLiW','attr','tur_btn','246kfGpGt','61064aDeyNJ','968350PCScJh'];_0x5d91=function(){return _0x530d1a;};return _0x5d91();}
  </script> 
  <script src="<?= base_url(); ?>/assets2/js/main.js"></script>
</html>