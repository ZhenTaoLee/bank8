<?php

namespace app\index\controller;
use app\common\model\AdvertisingModel;
use think\View;
use think\Controller;
use think\Loader;
use think\Request;

/**
 * 关于接口
 */
class About extends Index
{
   
  public function loginAbout()
  {


      $fcff="<h1>《用户协议和法律协议》</h1>
 　　本协议为您与鑫易贷APP管理者之间所订立的契约，具有合同的法律效力，请您仔细阅读。
<h2>一、 本协议内容、生效、变更</h2>
 　　本协议内容包括协议正文及所有鑫易贷APP已经发布的或将来可能发布的各类规则。所有规则为本协议不可分割的组成部分，与协议正文具有同等法律效力。如您对协议有任何疑问，应向鑫易贷APP咨询。您在同意所有协议条款并完成注册程序，才能成为本站的正式用户，您点击“我以阅读并同意鑫易贷APP用户协议和法律协议”按钮后，本协议即生效，对双方产生约束力。<br/>
 　　只要您使用鑫易贷APP平台服务，则本协议即对您产生约束，届时您不应以未阅读本协议的内容或者未获得鑫易贷APP对您问询的解答等理由，主张本协议无效，或要求撤销本协议。您确认：本协议条款是处理双方权利义务的契约，始终有效，法律另有强制性规定或双方另有特别约定的，依其规定。 您承诺接受并遵守本协议的约定。如果您不同意本协议的约定，您应立即停止注册程序或停止使用鑫易贷APP平台服务。鑫易贷APP有权根据需要不定期地制订、修改本协议及/或各类规则，并在鑫易贷APP平台公示，不再另行单独通知用户。变更后的协议和规则一经在网站公布，立即生效。如您不同意相关变更，应当立即停止使用鑫易贷APP平台服务。您继续使用鑫易贷APP平台服务的，即表明您接受修订后的协议和规则。<br/>
<h2>二、 注册与注销</h2>
 　　注册资格用户须具有法定的相应权利能力和行为能力的自然人、法人或其他组织，能够独立承担法律责任。您完成注册程序或其他鑫易贷APP平台同意的方式实际使用本平台服务时，即视为您确认自己具备主体资格，能够独立承担法律责任。若因您不具备主体资格，而导致的一切后果，由您及您的监护人自行承担。<br/>
<h2>注册资料</h2>
 　　2.1用户应自行诚信向本站提供注册资料，用户同意其提供的注册资料真实、准确、完整、合法有效，用户注册资料如有变动的，应及时更新其注册资料。如果用户提供的注册资料不合法、不真实、不准确、不详尽的，用户需承担因此引起的相应责任及后果，并且鑫易贷APP保留终止用户使用本平台各项服务的权利。<br/>
 　　2.2用户在本站进行浏览等活动时，涉及用户真实姓名/名称、通信地址、联系电话、电子邮箱等隐私信息的，本站将予以严格保密，除非得到用户的授权或法律另有规定，本站不会向外界披露用户隐私信息。<br/>
<h2>账户</h2>
 　　3.1您注册成功后，即成为鑫易贷APP平台的会员，将持有鑫易贷APP平台唯一编号的账户信息，您可以根据本站规定改变您的密码。<br/>
 　　3.2您设置的姓名为真实姓名，不得侵犯或涉嫌侵犯他人合法权益。否则，鑫易贷APP有权终止向您提供服务，注销您的账户。账户注销后，相应的会员名将开放给任意用户注册登记使用。<br/>
 　　3.3您应谨慎合理的保存、使用您的会员名和密码，应对通过您的会员名和密码实施的行为负责。除非有法律规定或司法裁定，且征得鑫易贷APP的同意，否则，会员名和密码不得以任何方式转让、赠与或继承（与账户相关的财产权益除外）。<br/>
 　　3.4用户不得将在本站注册获得的账户借给他人使用，否则用户应承担由此产生的全部责任，并与实际使用人承担连带责任。<br/>
 　　3.5如果发现任何非法使用等可能危及您的账户安全的情形时，您应当立即以有效方式通知鑫易贷APP要求暂停相关服务，并向公安机关报案。您理解鑫易贷APP对您的请求采取行动需要合理时间，鑫易贷APP对在采取行动前已经产生的后果（包括但不限于您的任何损失）不承担任何责任。<br/>
 　　3.6 注销<br/>
 　　在需要终止使用鑫易贷APP服务时，符合以下条件的，您可以申请注销您的会员号或鑫易贷APP账户：<br/>                                                              
 　　1、您仅能申请注销您本人的会员号或账户，并依照鑫易贷APP的流程进行注销。<br/>
 　　2、您可以通过自助或者人工的方式申请注销会员号或账户，但如果您使用了鑫易贷APP提供的安全产品，请在该安全产品环境下申请注销。      <br/>           
 　　3、您申请注销的会员号或账户处于正常状态，即您的会员号或账户的信息是最新、完整、正确的，且会员号或账户未被采取止付、冻结等限制措施。如您申请注销的鑫易贷APP账户有关联的鑫易贷APP账户或子鑫易贷APP账户的，在该关联的鑫易贷APP账户或子鑫易贷APP账户被注销后，您才能注销该账户。<br/>
 　　4、为了维护您和其他用户的合法利益，您申请注销的会员号或账户，应当不存在未了结的权利义务或其他因为注销该账户会产生纠纷的情况，不存在任何未完结交易，没有余额，没有关联的奖励积分等资产。<br/>

<h2>用户信息的合理使用</h2>
 　　4.1您同意鑫易贷APP平台拥有通过邮件、短信电话等形式，向在本站注册用户发送信息等告知信息的权利。<br/>
 　　4.2您了解并同意，鑫易贷APP有权应国家司法、行政等主管部门的要求，向其提供您在鑫易贷APP平台填写的注册信息和交易记录等必要信息。如您涉嫌侵犯他人知识产权，则鑫易贷APP亦有权在初步判断涉嫌侵权行为存在的情况下，向权利人提供您必要的身份信息<br/>。
 　　4.3用户同意鑫易贷APP有权使用用户的注册信息、用户名、密码等信息，登陆进入用户的注册账户，进行证据保全，包括但不限于公证、见证等。<br/>
<h2>免责条款</h2>
 　　5.1 本平台仅提供信息对接，发生一切纠纷问题皆与本平台无关，请通过仲裁部门维护各自权益。<br/>
";

      $ddd="<h1>充值与提现规则</h1> <h2>充值</h2> 经理端可通过充值入口，充值八币。使用八币可购买服务或参与活动等等。<br/> 充值方式可通过支付宝充值等。<br/> <h2>提现</h2> 在处理单后，会有服务奖励金存至经理端的钱包中。每个月经理可以提现20000八币以外的金额。<br/> 经理每个月只能提现一次。<br/> 每接一单，系统会冻结500八币，待此单结束后，500八币会解冻。<br/> 八币可用于购买平台相关服务和参与平台活动。<br/>";

      $ooo="<h1>信用卡提醒功能说明</h1> <h2>如何添加卡片？</h2> 答：可在首页底部导航栏点击还款提醒，在信用卡管理那里新增卡片，设置账单日作为提醒。 <h2>提醒功能是如何显示？</h2> 答：用户添加完卡片后，平台会在用户所设置的日期进行通知提醒以及短信提醒。客户需要在手机设置那里打开软件提醒（一般情况下默认是打开）。";

      $ppp="<h1>经理入驻操作手册</h1> <br/> 1、八号钱庄平台有权检测入驻经理真实的工作信息。<br/> 2、入驻经理若出现，通过不法信息曝光有损平台声誉的各种虚假信息情况，甲方有权追究乙方入驻经理法律责任。<br/> 3、产品权限：产品以机构为准，乙方的入驻经理有义务协助甲方上/下架及更新产品。<br/> 4、乙方入驻经理不得以任何方式向任何人泄露客户任何信息。一经发现，平台将立即终止协议，且经理须承担相应法律责任。<br/> 5、乙方入驻经理因客户自身原因做不成交易时，需飞单，必须在八号钱庄平台上的飞单群飞单（前提先与客户沟通好），同时飞单的信息要确保真实，备注完整该订单的信息。<br/> 6、完成订单后，不得以任何理由、信息等再次收取客户费用。<br/> 7、乙方入驻经理在完成注册及入驻流程后，为进行合法操作，依据协议约定规则操作，甲方通过“八号钱庄”平台可以对乙方进行管理，包括但不限于产品信息上传、修改、删除处理、交易跟踪，取消等。<br/> 8、乙方入驻经理向“八号钱庄”缴纳的2000元押金作为保证金，用以保证本协议履行及对产品和服务质量进行担保的金额，甲方可以依照本协议的相关约定对其进行处置。<br/> 9、乙方入驻经理所提供的所有产品，均以乙方自身名义进行产品信息上传、展示、咨询答复，等服务。乙方若在其过程出现与客户有争议，纠纷，国家机关机构调查时，由乙方全权负责。<br/> 10、乙方入驻经理已依照中华人民共和国法律注册，乙方所提供的所有产品来源合法，资料齐全，乙方同意本协议及“八号钱庄”平台相关规则，证明文件需提交。<br/> 11、乙方保证向甲方提供的上述证明文件或其他相关证明真实，合法，准确，有效，并保证上述证明文件或其他相关证明发生任何变更或更新导致乙方不符合本协议所规定入驻条件的，甲方有权单方面终止全部或部分乙方产品，直至终止本协议。<br/> 12、乙方对其提交的证明文件或其他相关证明的真实性，合法性，准确性，有效性承担全部法律责任，若因乙方提交虚假，过期文件或未及时更新或通知证明文件导致纠纷或被相关国家机关处罚的，由乙方独立承担全部法律责任，如因此造成“八号钱庄”平台损失的，乙方应予以赔偿，并立即解除合约。<br/> 13、若出现以下任一情形时，甲方有权随时终止与乙方的合作：<br/> （1）乙方不满足入驻条件的<br/> （2）乙方提供虚假资质文件的<br/> （3）乙方的服务质量违反合约规定的<br/> （4）乙方产品价格、规格等信息标示错误，导致行政处罚、争议和纠纷的<br/> （5）未经甲方事先审核的产品，而上传某品牌产品的<br/> （6）甲方认为乙方侵犯“八号钱庄”平台或用户权益的<br/> 14、甲方有权对乙方的注册信息，上传的相关数据信息，在“八号钱庄”发布的其他信息及交易行为进行监督检查，对发现的违法违规信息及相关内容，乙方同意甲方不经通知立即解除合约。<br/> 15、乙方需以服务为主，保证自身的服务质量，若与客户起冲突，甲方核实情况后，有权根据实情扣除押金100—500元。<br/> 16、乙方若以欺诈、胁迫等不正当手段损害用户利益及甲方声誉，甲方有权立即终止合作并不予退还押金。<br/> 17、乙方若单独或串通任何第三方直接或变相利用甲方服务入口实施任何欺诈行为的，甲方有权立即终止合作，并不予退还押金，造成的任何影响及损失应由乙方全权负责。<br/> 18、乙方若利用甲方平台进行非法交易，甲方有权立即终止合作，不予退还押金，并追究乙方入驻经理法律责任。<br/> 19、在乙方换渠道或选择退出时，甲方有权协助乙方退出平台及退还剩余金额。<br/>";



    return json(['state'=>2558,'data'=>['protocol'=>$fcff],'mesg'=>'操作完成']);

  }


  //充值提现协议
  public function payRule()
  {
    $ddd="<h1>充值与提现规则</h1> <h2>充值</h2> 经理端可通过充值入口，充值八币。使用八币可购买服务或参与活动等等。<br/> 充值方式可通过支付宝充值等。<br/> <h2>提现</h2> 在处理单后，会有服务奖励金存至经理端的钱包中。<br/>提现到账时间为7个工作日内。<br/> 每接一单，系统会冻结500八币，待此单结束后，500八币会解冻。<br/> 八币可用于购买平台相关服务和参与平台活动。<br/>";
    return json(['state'=>2558,'data'=>['protocol'=>$ddd],'mesg'=>'操作完成']);

  }


  public function handleManual()
  {
    $ppp="<h1>经理入驻操作手册</h1> <br/> 1、八号钱庄平台有权检测入驻经理真实的工作信息。<br/> 2、入驻经理若出现，通过不法信息曝光有损平台声誉的各种虚假信息情况，甲方有权追究乙方入驻经理法律责任。<br/> 3、产品权限：产品以机构为准，乙方的入驻经理有义务协助甲方上/下架及更新产品。<br/> 4、乙方入驻经理不得以任何方式向任何人泄露客户任何信息。一经发现，平台将立即终止协议，且经理须承担相应法律责任。<br/> 5、乙方入驻经理因客户自身原因做不成交易时，需飞单，必须在八号钱庄平台上的飞单群飞单（前提先与客户沟通好），同时飞单的信息要确保真实，备注完整该订单的信息。<br/> 6、完成订单后，不得以任何理由、信息等再次收取客户费用。<br/> 7、乙方入驻经理在完成注册及入驻流程后，为进行合法操作，依据协议约定规则操作，甲方通过“八号钱庄”平台可以对乙方进行管理，包括但不限于产品信息上传、修改、删除处理、交易跟踪，取消等。<br/> 8、乙方入驻经理向“八号钱庄”缴纳的2000元押金作为保证金，用以保证本协议履行及对产品和服务质量进行担保的金额，甲方可以依照本协议的相关约定对其进行处置。<br/> 9、乙方入驻经理所提供的所有产品，均以乙方自身名义进行产品信息上传、展示、咨询答复，等服务。乙方若在其过程出现与客户有争议，纠纷，国家机关机构调查时，由乙方全权负责。<br/> 10、乙方入驻经理已依照中华人民共和国法律注册，乙方所提供的所有产品来源合法，资料齐全，乙方同意本协议及“八号钱庄”平台相关规则，证明文件需提交。<br/> 11、乙方保证向甲方提供的上述证明文件或其他相关证明真实，合法，准确，有效，并保证上述证明文件或其他相关证明发生任何变更或更新导致乙方不符合本协议所规定入驻条件的，甲方有权单方面终止全部或部分乙方产品，直至终止本协议。<br/> 12、乙方对其提交的证明文件或其他相关证明的真实性，合法性，准确性，有效性承担全部法律责任，若因乙方提交虚假，过期文件或未及时更新或通知证明文件导致纠纷或被相关国家机关处罚的，由乙方独立承担全部法律责任，如因此造成“八号钱庄”平台损失的，乙方应予以赔偿，并立即解除合约。<br/> 13、若出现以下任一情形时，甲方有权随时终止与乙方的合作：<br/> （1）乙方不满足入驻条件的<br/> （2）乙方提供虚假资质文件的<br/> （3）乙方的服务质量违反合约规定的<br/> （4）乙方产品价格、规格等信息标示错误，导致行政处罚、争议和纠纷的<br/> （5）未经甲方事先审核的产品，而上传某品牌产品的<br/> （6）甲方认为乙方侵犯“八号钱庄”平台或用户权益的<br/> 14、甲方有权对乙方的注册信息，上传的相关数据信息，在“八号钱庄”发布的其他信息及交易行为进行监督检查，对发现的违法违规信息及相关内容，乙方同意甲方不经通知立即解除合约。<br/> 15、乙方需以服务为主，保证自身的服务质量，若与客户起冲突，甲方核实情况后，有权根据实情扣除押金100—500元。<br/> 16、乙方若以欺诈、胁迫等不正当手段损害用户利益及甲方声誉，甲方有权立即终止合作并不予退还押金。<br/> 17、乙方若单独或串通任何第三方直接或变相利用甲方服务入口实施任何欺诈行为的，甲方有权立即终止合作，并不予退还押金，造成的任何影响及损失应由乙方全权负责。<br/> 18、乙方若利用甲方平台进行非法交易，甲方有权立即终止合作，不予退还押金，并追究乙方入驻经理法律责任。<br/> 19、在乙方换渠道或选择退出时，甲方有权协助乙方退出平台及退还剩余金额。<br/>";



    return json(['state'=>2558,'data'=>['protocol'=>$ppp],'mesg'=>'操作完成']);

    }
//    <h2>第五条 服务费用</h2>
//    您确认，在您注册成为八号钱庄用户以接受八号钱庄的服务，或您以其他八号钱庄允许的方式实际使用八号钱庄服务前，您已充分阅读、理解并接受本规则的全部内容，一旦您使用八号钱庄服务，即表示您同意遵循本规则之所有约定。
//    在您使用八号钱庄服务时，八号钱庄有权依照本协议【第五条 5.1】向您收取服务费用。八号钱庄拥有制订及调整服务费之权利，具体服务费用以您使用八号钱庄服务时本平台页面上所列之收费方式公告或您与八号钱庄达成的其他书面协议为准。除非另有说明或约定，您同意八号钱庄有权自您使用或购买八号钱庄的付费服务后24小时之内向您收取相关服务费用且您成功支付。<br/>
//    <h3>5.1 费用类别与金额<h3/>
//    	5.1.1 信息服务费
//    信息服务费为899元，是用户在订单成功之后支付，订单失败不需要支付。信息服务费的收取表示您已在八号钱庄平台使用并成功完成融资这一收费功能。<br/>
//    您须通过八号钱庄软件中的八号钱庄或银行卡转账的方式向我司支付信息咨询费。<br/>
//    	5.1.2 其他各类费用
//    其他各类费用为购买付费功能所产生费用，如提醒功能购买等。八号钱庄平台将会在相关页面标明价格，并在您支付购买后通过系统通知提示您。<br>
//    <h3>5.2 费用提示<h3>
//    5.2.1 您可通过八号钱庄中个人中心的支付记录，或系统推送通知，查看您的支付记录。<br/>
//    5.2.2 您认可您使用八号钱庄服务的支付记录、支付金额、应向我司支付的付   费数据均以八号钱庄平台记录为准。如您对八号钱庄所收取的费用有任何疑义，应在三日内向八号钱庄提出，否则视为无疑义。<br/>



  public function rabout()
  {
    $abc="<h1>用户服务协议</h1> 广州中瀛信息科技有限公司（以下称“我司”）根据您的需求，通过实时的线上线下信息交互，线下资源借助大数据分析有效匹配，为您提供多样化的平台咨询服务，您访问和使用有关网站，服务，应用程序提供的信息服务功能使用本用户协议（以下简称“协议”）<br/> 在您注册，使用有关网站，应用程序及接受我司八号钱庄平台中的服务之前，请您认真阅读本协议（尤其是粗体标注部分）。你选择并使用服务即视为您以充分阅读并接受本协议的所有条款，您同意本协议对您和我司具有法律约束力。<br/> 如本协议发生变更，八号钱庄将通过软件内系统公告的方式提前予以公布，变更后的协议在公告期届满起生效。若您在协议生效后继续使用八号钱庄服务的，表示您接受变更后的协议，也将遵循变更后的协议使用八号钱庄服务。<br/> 如您为无民事行为能力人或为限制民事行为能力人，请告知您的监护人，并在您监护人的指导下阅读本协议和使用八号钱庄服务。若您是中国大陆以外的用户，您还需同时遵守您所属国家或地区的法律，且您确认，订立并履行本协议不受您所属、所居住或开展经营活动或其他业务的国家或地区法律法规的限制。<br/> <h2>第一条	用户账号的使用</h2> 1.1为使用本软件服务，您须在移动设备上下载“八号钱庄”应用程序并进行注册，注册时您必须保证提供真有效的信息，移动电话号码等。您知晓并同意，您已经成为八号钱庄平台注册用户，将会默认开通我司服务账户，账号及密码默认为八号钱庄平台的账号及密码。<br/>1.2如果您是代表个人签订本协议，您应具有完全民事行为能力；如果您是代表法人实体签订本协议，您应获得授权并遵守本《用户服务协议》（并约束该法人实体）<br/>1.3 账户使用，身份要素是八号钱庄识别您身份的依据，请您务必妥善保管。 使用身份要素进行的任何操作、发出的任何指令均视为您本人做出。因您的原因造成的账户、密码等信息被冒用、盗用或非法使用，由此引起的一切风险、责任、损失、费用等应由您自行承担。<br/>1.4 基于不同的终端以及您的使用习惯，我们可能采取不同的验证措施识别您的身份。例如您的八号钱庄账户在新设备首次登录的，我们可能通过密码加校验码的方式识别您的身份。<br/>1.5 为保障您的资金安全，请把手机及其他设备的密码设置成与八号钱庄会员号及账户的密码不一致。如您发现有他人冒用或盗用您的会员号、账户或者八号钱庄登录名及密码，或您的手机或其他有关设备丢失时，请您立即以有效方式通知八号钱庄，您还可以向八号钱庄申请暂停或停止八号钱庄服务。<br/>1.6 八号钱庄会员账号仅限您本人使用，不可转让、借用、赠与、继承，但八号钱庄账户内的相关财产权益可被依法继承。<br/>1.7 基于运行和交易安全的需要，八号钱庄可以暂停或者限制八号钱庄服务部分功能，或增加新的功能。<br/>1.8 为了维护良好的网络环境，八号钱庄有时需要了解您使用八号钱庄服务的真实背景及目的，如八号钱庄要求您提供相关信息或资料的，请您配合提供。<br/>1.9为了您的交易安全，您在使用八号钱庄服务时，请事先判断交易对方是否具有完全民事行为能力并谨慎决定是否使用八号钱庄服务与对方进行交易。<br/> 2.0 注销 在需要终止使用八号钱庄服务时，符合以下条件的，您可以申请注销您的会员号或八号钱庄账户：<br/> 1、您仅能申请注销您本人的会员号或账户，并依照八号钱庄的流程进行注销。<br/> 2、您可以通过自助或者人工的方式申请注销会员号或账户，但如果您使用了八号钱庄提供的安全产品，请在该安全产品环境下申请注销。<br/> 3、您申请注销的会员号或账户处于正常状态，即您的会员号或账户的信息是最新、完整、正确的，且会员号或账户未被采取止付、冻结等限制措施。如您申请注销的八号钱庄账户有关联的八号钱庄账户或子八号钱庄账户的，在该关联的八号钱庄账户或子八号钱庄账户被注销后，您才能注销该账户。<br/> 4、为了维护您和其他用户的合法利益，您申请注销的会员号或账户，应当不存在未了结的权利义务或其他因为注销该账户会产生纠纷的情况，不存在任何未完结交易，没有余额，没有关联的奖励积分等资产。<br/>   <h2> 服务内容</h2> 您在八号钱庄平台上，可获取您需要的融资等服务。您可通过下载并安装到移动设备上“八号钱庄”应用程序选择并使用上述服务。<br/>  <h2>第三条 合同订立</h2> 您理解并同意，您通过八号钱庄平台选择并使用我们的服务，即视为接受本《用户服务协议》并依据本协议与我司达成了合约（以下简称“合约”）<br/> <h2> 第四条 服务使用</h2> 4.1您可以通过八号钱庄平台提供的信息服务。我司将会按照您输入的信息匹配符合您需求的对应服务。<br/> 4.2我司将作出合理的努力，让您获得服务。但这受制于您请求服务之时所在的区域业务是否上限。<br/>  <h2>	第五条 担保及承诺</h2> 5.1您担保，您向我们提供的信息真实，准确，完整。为实现平台服务功能。我们有权检验您所提供的信息，并有权在不提供任何理由的情况下拒绝向您提供服务或拒绝您使用有关网站，服务，应用程序。<br/> 5.2您使用我司服务或八号钱庄平台，即表示您还同意以下事项：<br/> a.您出于您个人用途使用服务或下载应用程序，并且不会转售给第三方<br/> b.您不会将服务或应用程序用于非法目的，包括（但不限于）发送或储存任何非法资料或者用语欺诈目的；<br/> c.您不会利用服务或应用程序骚扰，妨碍它们或造成不便；<br/> d.您不会影响网络的正常运行；<br/> e.您不会尝试危害服务或应用程序；<br/> f.当我们提出合理请求时，您会提供身份证；<br/> g.您将遵守国家／地区以及您在使用应用程序或服务时所处国家／地区，省会／或市的所有适用法律。<br/> 5.3如果您违反以上任一约定，我们保留立即终止向您提供服务和拒绝您使用有关网站，服务，应用程序的权利。<br/> <h2>第六条 赔偿</h2> 您使用八号钱庄平台的各应用程序及服务，即表示您接受本《用户服务协议》并同意；对于因一下事项产生的或与以下事项相关的任何及所有索赔，费用，赔偿，损失，债务，开销（包括但不限于律师费和诉讼费），您应该予以赔偿；<br/> a.	您触犯或违反本《用户服务协议》中的任何条款或任何使用的法律法规（无论此处是否提及）； b.	您触犯任何第三方的任何权利； c.	您滥用应用程序或服务 <h2>第七条 责任</h2> 7.1在网站或八号钱庄平台上向您提供的信息，推荐的服务仅供您参考。我们将在合理的范围内尽力保证该等信息准确，但无法保证其中没有任何错误，缺陷，恶意软件，病毒。对于因使用（或无法使用）网站或八号钱庄平台导致任何损害，我们不承担责任（除非此类损害是由我们的故意或重大的过失造成的）。此外，对于因使用（或无法使用）与网站或八号钱庄平台的电子通信手段导致的任何损害，包括（但不受限于）因电子通信传达失败或延时，第三方或用语电子通信的计算机程序对电子通信的拦截或操控，以及病毒传输导致的损害，我们不承担责任。</br> 7.2您知悉并确认，您通过八号钱庄信息平台的信息服务，由我司根据您发出的服务需求信息，经过后台大数据信息处理，在用户终端上提供可供选择的信息，并由最终匹配成功的服务承接人员实际向您提供线下处理。为更好保障用户权益，我司将通过平台规范的方式约束平台中参与方严格遵守平台规则，保障用户权益，我司负责平台规则的合理化及监督规则的实施。从需求用户发送订单并由系统成功匹配开始，到订单完成之时，为八号钱庄平台信息服务区间，保障用户信息服务，对于超出法律规定应当赔偿的部分或存在侵权责任人，违约责任人的，我司有权向其有关事迹责任方追偿。</br> <h2>第八条 知识产权政策</h2> 8.1 八号钱庄及关联公司所有系统及本程序上所有内容，包括但不限于著作、图片、档案、资讯、资料、网站架构、网站画面的安排、网页设计，均由八号钱庄或八号钱庄关联公司依法拥有其知识产权，包括但不限于商标权、专利权、著作权、商业秘密等。</br> 8.2 非经八号钱庄或八号钱庄关联公司书面同意，任何人不得擅自使用、修改、反向编译、复制、公开传播、改变、散布、发行或公开发表本程序或内容。</br> 8.3 尊重知识产权是您应尽的义务，如有违反，您应承担损害赔偿责任。</br> <h2>第十条 第三方链接</h2> 在您使用应用程序期间，我们可能会不时地提供由第三方拥有并控制的网站链接，以便您跟第三方沟通向其购买产品或服务，参加其提供的促销活动。该等链接会带领您离开网站，八号钱庄平台。并且该等连接所指向的第三方网站内容不在我们控制范围之内，这些第三方网站各自订立了条款，条件和隐私政策。因此，我们不会向这些网站的内容和活动负责，也不会承担任何义务，您应充分理解该等网站的内容及活动并自己全力承担浏览或访问这些网站的法律责任及风险。</br> <h2> 第十条 合约期限<h2> 10.1我们和您订立的这份合约是无固定期限合约。</br> 10.2您有权随时通过永久删除智能手机上安装的应用程序来终止合约，这样讲禁止您使用八号钱庄平台及其中的应用程序和服务。您可以随时按照我们网站上的说明注销用户账户。</br> 10.3如果您做出以下行为，我们有权随时终止合约并立即生效（及禁止您使用应用程序和服务）</br> a.您触犯或违反本《用户服务协议》中的任何条款； b.我们认为，您滥用应用程序或服务。我们没有义务提前通知合约终止。终止合约之后，我们将按照本《用户服务协议》给出相关通知。 <h2>  第十一条 管辖约定<h2> 本《用户服务协议》适用中国法律。根据中华人民共和国法律具有管辖权的法院管辖关于本《用户服务协议》的违约，终止，履行，解释或有效性，或者网站，八号钱庄平台的使用所产生的或与其相关的任何冲突，赔偿或纠纷（统称为“争议”）";


    return json(['state'=>2558,'data'=>['protocol'=>$abc],'mesg'=>'操作完成']);

  }


  public function mapping()
  {
  	
  $abc=' <h1>用户服务协议</h1> <h2> 第一条 前言</h2> 　　深圳市鑫易贷互联网金融限公司（以下称“我司”）根据您的需求，通过实时的线上线下信息交互，线下资源借助大数据分析有效匹配，为您提供多样化的平台咨询服务，您访问和使用有关网站，服务，应用程序提供的信息服务功能使用本用户协议（以下简称“协议”）<br/> 　　在您注册，使用有关网站，应用程序及接受我司鑫易贷八号钱庄平台中的服务之前，请您认真阅读本协议（尤其是粗体标注部分）。你选择并使用服务即视为您以充分阅读并接受本协议的所有条款，您同意本协议对您和我司具有法律约束力。 如本协议发生变更，鑫易贷八号钱庄将通过软件内系统公告的方式提前予以公布，变更后的协议在公告期届满起生效。若您在协议生效后继续使用鑫易贷八号钱庄服务的，表示您接受变更后的协议，也将遵循变更后的协议使用鑫易贷八号钱庄服务。 如您为无民事行为能力人或为限制民事行为能力人，请告知您的监护人，并在您监护人的指导下阅读本协议和使用鑫易贷八号钱庄服务。若您是中国大陆以外的用户，您还需同时遵守您所属国家或地区的法律，且您确认，订立并履行本协议不受您所属、所居住或开展经营活动或其他业务的国家或地区法律法规的限制。<br/><br/> <h2>第二条 服务内容</h2> 　　您在鑫易贷八号钱庄平台上，可获取您需要的融资等服务。您可通过下载并安装到移动设备上“鑫易贷八号钱庄”应用程序选择并使用服务。鑫易贷八号钱庄会为您提供匹配功能，可以按照您填写的情况匹配出适合您的结果。本APP还具有个税计算器等功能，为您提供正确的参考性数据，方便您的生活。<br/><br/> <h2>第三条 合同订立</h2> 　　您理解并同意，您通过鑫易贷八号钱庄平台选择并使用我们的服务，即视为接受本《用户服务协议》并依据本协议与我司达成了合约（以下简称“合约”）<br/><br/> <h2>第四条 服务使用</h2> 　　4.1您可以通过鑫易贷八号钱庄平台提供的信息服务。我司将会按照您输入的信息匹配符合您需求的对应服务。<br/> 　　4.2我司将作出合理的努力，让您获得服务。但这受制于您请求服务之时所在的区域业务是否上限。<br/><br/> <h2>	第五条 担保及承诺</h2> 　　5.1您担保，您向我们提供的信息真实，准确，完整。为实现平台服务功能。我们有权检验您所提供的信息，并有权在不提供任何理由的情况下拒绝向您提供服务或拒绝您使用有关网站，服务，应用程序。<br/> 　　5.2您使用我司服务或鑫易贷八号钱庄平台，即表示您还同意以下事项：<br/> 　　a.您出于您个人用途使用服务或下载应用程序，并且不会转售给第三方<br/> 　　b.您不会将服务或应用程序用于非法目的，包括（但不限于）发送或储存任何非法资料或者用语欺诈目的；<br/> 　　c.您不会利用服务或应用程序骚扰，妨碍它们或造成不便；<br/> 　　d.您不会影响网络的正常运行；<br/> 　　e.您不会尝试危害服务或应用程序；<br/> 　　f.当我们提出合理请求时，您会提供身份证；<br/> 　　g.您将遵守国家／地区以及您在使用应用程序或服务时所处国家／地区，省会／或市的所有适用法律。<br/> 　　6.3如果您违反以上任一约定，我们保留立即终止向您提供服务和拒绝您使用有关网站，服务，应用程序的权利。<br/><br/> <h2>第六条 赔偿</h2> 　　您使用鑫易贷八号钱庄平台的各应用程序及服务，即表示您接受本《用户服务协议》并同意；对于因一下事项产生的或与以下事项相关的任何及所有索赔，费用，赔偿，损失，债务，开销（包括但不限于律师费和诉讼费），您应该予以赔偿；<br/> 　　a.您触犯或违反本《用户服务协议》中的任何条款或任何使用的法律法规（无论此处是否提及）；<br/> 　　b.您触犯任何第三方的任何权利；<br/> 　　c.您滥用应用程序或服务<br/><br/> <h2>第七条 责任</h2> 　　7.1在网站或鑫易贷八号钱庄平台上向您提供的信息，推荐的服务仅供您参考。我们将在合理的范围内尽力保证该等信息准确，但无法保证其中没有任何错误，缺陷，恶意软件，病毒。对于因使用（或无法使用）网站或鑫易贷八号钱庄平台导致任何损害，我们不承担责任（除非此类损害是由我们的故意或重大的过失造成的）。此外，对于因使用（或无法使用）与网站或鑫易贷八号钱庄平台的电子通信手段导致的任何损害，包括（但不受限于）因电子通信传达失败或延时，第三方或用语电子通信的计算机程序对电子通信的拦截或操控，以及病毒传输导致的损害，我们不承担责任。<br/> 　　7.2您知悉并确认，您通过鑫易贷八号钱庄信息平台的信息服务，由我司根据您发出的服务需求信息，经过后台大数据信息处理，在用户终端上提供可供选择的信息，并由最终匹配成功的服务承接人员实际向您提供线下处理。为更好保障用户权益，我司将通过平台规范的方式约束平台中参与方严格遵守平台规则，保障用户权益，我司负责平台规则的合理化及监督规则的实施。从需求用户发送订单并由系统成功匹配开始，到订单完成之时，为鑫易贷八号钱庄平台信息服务区间，保障用户信息服务，对于超出法律规定应当赔偿的部分或存在侵权责任人，违约责任人的，我司有权向其有关事迹责任方追偿。<br/><br/> <h2> 第八条 知识产权政策</h2> 　　8.1 鑫易贷八号钱庄及关联公司所有系统及本程序上所有内容，包括但不限于著作、图片、档案、资讯、资料、网站架构、网站画面的安排、网页设计，均由鑫易贷八号钱庄或鑫易贷八号钱庄关联公司依法拥有其知识产权，包括但不限于商标权、专利权、著作权、商业秘密等。<br/> 　　8.2 非经鑫易贷八号钱庄或鑫易贷八号钱庄关联公司书面同意，任何人不得擅自使用、修改、反向编译、复制、公开传播、改变、散布、发行或公开发表本程序或内容。<br/> 　　8.3 尊重知识产权是您应尽的义务，如有违反，您应承担损害赔偿责任。<br/><br/> <h2>第九条 第三方链接</h2> 　　在您使用应用程序期间，我们可能会不时地提供由第三方拥有并控制的网站链接，以便您跟第三方沟通向其购买产品或服务，参加其提供的促销活动。该等链接会带领您离开网站，鑫易贷八号钱庄平台。并且该等连接所指向的第三方网站内容不在我们控制范围之内，这些第三方网站各自订立了条款，条件和隐私政策。因此，我们不会向这些网站的内容和活动负责，也不会承担任何义务，您应充分理解该等网站的内容及活动并自己全力承担浏览或访问这些网站的法律责任及风险。<br/><br/> <h2>第十条 合约期限</h2> 　　10.1我们和您订立的这份合约是无固定期限合约。<br/> 　　10.2您有权随时通过永久删除智能手机上安装的应用程序来终止合约，这样讲禁止您使用鑫易贷八号钱庄平台及其中的应用程序和服务。您可以随时按照我们网站上的说明注销用户账户。<br/> 　　10.3如果您做出以下行为，我们有权随时终止合约并立即生效（及禁止您使用应用程序和服务）<br/> 　　a.您触犯或违反本《用户服务协议》中的任何条款；<br/> 　　b.我们认为，您滥用应用程序或服务。我们没有义务提前通知合约终止。终止合约之后，我们将按照本《用户服务协议》给出相关通知。<br/><br/> <h2>第十一条 管辖约定</h2> <b>　　本《用户服务协议》适用中国法律。根据中华人民共和国法律具有管辖权的法院管辖关于本《用户服务协议》的违约，终止，履行，解释或有效性，或者网站，鑫易贷八号钱庄平台的使用所产生的或与其相关的任何冲突，赔偿或纠纷（统称为“争议”）。</b>';
   return json(['state'=>2558,'data'=>['protocol'=>$abc],'mesg'=>'操作完成']);

  }

//八号幸福注册协议
  public function happregister()
  {
    $ddd="<h1>《用户协议和法律协议》</h1>
<h2>本协议为您与八号幸福APP管理者之间所订立的契约，具有合同的法律效力，请您仔细阅读。</h2>
<h2>一、 本协议内容、生效、变更</h2>
　　本协议内容包括协议正文及所有八号幸福APP已经发布的或将来可能发布的各类规则。所有规则为本协议不可分割的组成部分，与协议正文具有同等法律效力。如您对协议有任何疑问，应向八号幸福APP咨询。您在同意所有协议条款并完成注册程序，才能成为本站的正式用户，您点击“我以阅读并同意八号幸福APP用户协议和法律协议”按钮后，本协议即生效，对双方产生约束力。<br/> 
　　只要您使用八号幸福APP平台服务，则本协议即对您产生约束，届时您不应以未阅读本协议的内容或者未获得八号幸福APP对您问询的解答等理由，主张本协议无效，或要求撤销本协议。您确认：本协议条款是处理双方权利义务的契约，始终有效，法律另有强制性规定或双方另有特别约定的，依其规定。 您承诺接受并遵守本协议的约定。如果您不同意本协议的约定，您应立即停止注册程序或停止使用八号幸福APP平台服务。八号幸福APP有权根据需要不定期地制订、修改本协议及/或各类规则，并在八号幸福APP平台公示，不再另行单独通知用户。变更后的协议和规则一经在网站公布，立即生效。如您不同意相关变更，应当立即停止使用八号幸福APP平台服务。您继续使用八号幸福APP平台服务的，即表明您接受修订后的协议和规则。<br/> 
<h2>二、 注册与注销</h2>
　　注册资格用户须具有法定的相应权利能力和行为能力的自然人、法人或其他组织，能够独立承担法律责任。您完成注册程序或其他八号幸福APP平台同意的方式实际使用本平台服务时，即视为您确认自己具备主体资格，能够独立承担法律责任。若因您不具备主体资格，而导致的一切后果，由您及您的监护人自行承担。
注册资料<br/> 
　　2.1用户应自行诚信向本站提供注册资料，用户同意其提供的注册资料真实、准确、完整、合法有效，用户注册资料如有变动的，应及时更新其注册资料。如果用户提供的注册资料不合法、不真实、不准确、不详尽的，用户需承担因此引起的相应责任及后果，并且八号幸福APP保留终止用户使用本平台各项服务的权利。<br/> 
　　2.2用户在本站进行浏览等活动时，涉及用户真实姓名/名称、通信地址、联系电话、电子邮箱等隐私信息的，本站将予以严格保密，除非得到用户的授权或法律另有规定，本站不会向外界披露用户隐私信息。<br/> 
<h2>三、账户</h2>
　　3.1您注册成功后，即成为八号幸福APP平台的会员，将持有八号幸福APP平台唯一编号的账户信息，您可以根据本站规定改变您的密码。<br/> 
　　3.2您设置的姓名为真实姓名，不得侵犯或涉嫌侵犯他人合法权益。否则，八号幸福APP有权终止向您提供服务，注销您的账户。账户注销后，相应的会员名将开放给任意用户注册登记使用。<br/> 
　　3.3您应谨慎合理的保存、使用您的会员名和密码，应对通过您的会员名和密码实施的行为负责。除非有法律规定或司法裁定，且征得八号幸福APP的同意，否则，会员名和密码不得以任何方式转让、赠与或继承（与账户相关的财产权益除外）。<br/> 
　　3.4用户不得将在本站注册获得的账户借给他人使用，否则用户应承担由此产生的全部责任，并与实际使用人承担连带责任。<br/> 
　　3.5如果发现任何非法使用等可能危及您的账户安全的情形时，您应当立即以有效方式通知八号幸福APP要求暂停相关服务，并向公安机关报案。您理解八号幸福APP对您的请求采取行动需要合理时间，八号幸福APP对在采取行动前已经产生的后果（包括但不限于您的任何损失）不承担任何责任。<br/> 
　　3.6 注销
　　在需要终止使用八号幸福APP服务时，符合以下条件的，您可以申请注销您的会员号或八号幸福APP账户：<br/>                                                               
　　a、您仅能申请注销您本人的会员号或账户，并依照八号幸福APP的流程进行注销。<br/> 
　　b、您可以通过自助或者人工的方式申请注销会员号或账户，但如果您使用了八号幸福APP提供的安全产品，请在该安全产品环境下申请注销。     <br/>             
　　c、您申请注销的会员号或账户处于正常状态，即您的会员号或账户的信息是最新、完整、正确的，且会员号或账户未被采取止付、冻结等限制措施。如您申请注销的八号幸福APP账户有关联的八号幸福APP账户或子八号幸福APP账户的，在该关联的八号幸福APP账户或子八号幸福APP账户被注销后，您才能注销该账户。<br/> 
　　d、为了维护您和其他用户的合法利益，您申请注销的会员号或账户，应当不存在未了结的权利义务或其他因为注销该账户会产生纠纷的情况，不存在任何未完结交易，没有余额，没有关联的奖励积分等资产。<br/> 

<h2>四、用户信息的合理使用</h2>
　　4.1您同意八号幸福APP平台拥有通过邮件、短信电话等形式，向在本站注册用户发送信息等告知信息的权利。<br/> 
　　4.2您了解并同意，八号幸福APP有权应国家司法、行政等主管部门的要求，向其提供您在八号幸福APP平台填写的注册信息和交易记录等必要信息。如您涉嫌侵犯他人知识产权，则八号幸福APP亦有权在初步判断涉嫌侵权行为存在的情况下，向权利人提供您必要的身份信息。<br/> 
　　4.3用户同意八号幸福APP有权使用用户的注册信息、用户名、密码等信息，登陆进入用户的注册账户，进行证据保全，包括但不限于公证、见证等。<br/> 
<h2>五、免责条款</h2>
<b>　　5.1 本平台仅提供信息对接，发生一切纠纷问题皆与本平台无关，请通过仲裁部门维护各自权益。</b>";
    
    return json(['state'=>2558,'data'=>['protocol'=>$ddd],'mesg'=>'操作完成']);

  } 
  
   //八号幸福服务协议
  public function happserve()
  {
    $ddd="<h1>用户服务协议</h1>
<h2>第一条 前言</h2>
　　深圳市鑫易贷互联网金融限公司（以下称“我司”）根据您的需求，通过实时的线上线下信息交互，线下资源借助大数据分析有效匹配，为您提供多样化的平台咨询服务，您访问和使用有关网站，服务，应用程序提供的信息服务功能使用本用户协议（以下简称“协议”）<br/>
　　在您注册，使用有关网站，应用程序及接受我司八号幸福APP平台中的服务之前，请您认真阅读本协议（尤其是粗体标注部分）。你选择并使用服务即视为您以充分阅读并接受本协议的所有条款，您同意本协议对您和我司具有法律约束力。<br/>
　　如本协议发生变更，八号幸福APP将通过软件内系统公告的方式提前予以公布，变更后的协议在公告期届满起生效。若您在协议生效后继续使用八号幸福APP服务的，表示您接受变更后的协议，也将遵循变更后的协议使用八号幸福APP服务。<br/>
如您为无民事行为能力人或为限制民事行为能力人，请告知您的监护人，并在您监护人的指导下阅读本协议和使用八号幸福APP服务。若您是中国大陆以外的用户，您还需同时遵守您所属国家或地区的法律，且您确认，订立并履行本协议不受您所属、所居住或开展经营活动或其他业务的国家或地区法律法规的限制。<br/>
    <h2>第二条 服务内容</h2>
　　您在八号幸福APP平台上，可获取您需要的融资等服务。您可通过下载并安装到移动设备上“八号幸福APP”应用程序选择并使用服务。八号幸福APP会为您提供匹配功能，可以按照您填写的情况匹配出适合您的结果。本APP还具有个税计算器等功能，为您提供正确的参考性数据，方便您的生活。<br/>
   <h2>第三条 合同订立</h2>
　　您理解并同意，您通过八号幸福APP平台选择并使用我们的服务，即视为接受本《用户服务协议》并依据本协议与我司达成了合约（以下简称“合约”）<br/>
   <h2>第四条 服务使用</h2>
　　4.1您可以通过八号幸福APP平台提供的信息服务。我司将会按照您输入的信息匹配符合您需求的对应服务。<br/>
　　4.2我司将作出合理的努力，让您获得服务。但这受制于您请求服务之时所在的区域业务是否上限。<br/>
   	<h2>第五条 担保及承诺</h2>
　　5.1您担保，您向我们提供的信息真实，准确，完整。为实现平台服务功能。我们有权检验您所提供的信息，并有权在不提供任何理由的情况下拒绝向您提供服务或拒绝您使用有关网站，服务，应用程序。<br/>
　　5.2您使用我司服务或八号幸福APP平台，即表示您还同意以下事项：<br/>
　　a.您出于您个人用途使用服务或下载应用程序，并且不会转售给第三方<br/>
　　b.您不会将服务或应用程序用于非法目的，包括（但不限于）发送或储存任何非法资料或者用语欺诈目的；<br/>
　　c.您不会利用服务或应用程序骚扰，妨碍它们或造成不便；<br/>
　　d.您不会影响网络的正常运行；<br/>
　　e.您不会尝试危害服务或应用程序；<br/>
　　f.当我们提出合理请求时，您会提供身份证；<br/>
　　g.您将遵守国家／地区以及您在使用应用程序或服务时所处国家／地区，省会／或市的所有适用法律。<br/>
　　5.3如果您违反以上任一约定，我们保留立即终止向您提供服务和拒绝您使用有关网站，服务，应用程序的权利。<br/>
<h2>第六条 赔偿</h2>
　　您使用八号幸福APP平台的各应用程序及服务，即表示您接受本《用户服务协议》并同意；对于因一下事项产生的或与以下事项相关的任何及所有索赔，费用，赔偿，损失，债务，开销（包括但不限于律师费和诉讼费），您应该予以赔偿；<br/>
　　a.您触犯或违反本《用户服务协议》中的任何条款或任何使用的法律法规（无论此处是否提及）；<br/>
　　b.您触犯任何第三方的任何权利；<br/>
　　c.您滥用应用程序或服务<br/>
<h2>第七条 责任</h2>
　　7.1在网站或八号幸福APP平台上向您提供的信息，推荐的服务仅供您参考。我们将在合理的范围内尽力保证该等信息准确，但无法保证其中没有任何错误，缺陷，恶意软件，病毒。对于因使用（或无法使用）网站或八号幸福APP平台导致任何损害，我们不承担责任（除非此类损害是由我们的故意或重大的过失造成的）。此外，对于因使用（或无法使用）与网站或八号幸福APP平台的电子通信手段导致的任何损害，包括（但不受限于）因电子通信传达失败或延时，第三方或用语电子通信的计算机程序对电子通信的拦截或操控，以及病毒传输导致的损害，我们不承担责任。<br/>
　　7.2您知悉并确认，您通过八号幸福APP信息平台的信息服务，由我司根据您发出的服务需求信息，经过后台大数据信息处理，在用户终端上提供可供选择的信息，并由最终匹配成功的服务承接人员实际向您提供线下处理。为更好保障用户权益，我司将通过平台规范的方式约束平台中参与方严格遵守平台规则，保障用户权益，我司负责平台规则的合理化及监督规则的实施。从需求用户发送订单并由系统成功匹配开始，到订单完成之时，为八号幸福APP平台信息服务区间，保障用户信息服务，对于超出法律规定应当赔偿的部分或存在侵权责任人，违约责任人的，我司有权向其有关事迹责任方追偿。<br/>
    <h2>第八条 知识产权政策</h2>
　　8.1 八号幸福APP及关联公司所有系统及本程序上所有内容，包括但不限于著作、图片、档案、资讯、资料、网站架构、网站画面的安排、网页设计，均由八号幸福APP或八号幸福APP关联公司依法拥有其知识产权，包括但不限于商标权、专利权、著作权、商业秘密等。<br/>
　　8.2 非经八号幸福APP或八号幸福APP关联公司书面同意，任何人不得擅自使用、修改、反向编译、复制、公开传播、改变、散布、发行或公开发表本程序或内容。<br/>
　　8.3 尊重知识产权是您应尽的义务，如有违反，您应承担损害赔偿责任。<br/>
<h2>第九条 第三方链接</h2>
　　在您使用应用程序期间，我们可能会不时地提供由第三方拥有并控制的网站链接，以便您跟第三方沟通向其购买产品或服务，参加其提供的促销活动。该等链接会带领您离开网站，八号幸福APP平台。并且该等连接所指向的第三方网站内容不在我们控制范围之内，这些第三方网站各自订立了条款，条件和隐私政策。因此，我们不会向这些网站的内容和活动负责，也不会承担任何义务，您应充分理解该等网站的内容及活动并自己全力承担浏览或访问这些网站的法律责任及风险。<br/>
   <h2>第十条 合约期限</h2>
　　10.1我们和您订立的这份合约是无固定期限合约。<br/>
　　10.2您有权随时通过永久删除智能手机上安装的应用程序来终止合约，这样讲禁止您使用八号幸福APP平台及其中的应用程序和服务。您可以随时按照我们网站上的说明注销用户账户。<br/>
　　10.3如果您做出以下行为，我们有权随时终止合约并立即生效（及禁止您使用应用程序和服务）<br/>
　　a.您触犯或违反本《用户服务协议》中的任何条款；<br/>
　　b.我们认为，您滥用应用程序或服务。我们没有义务提前通知合约终止。终止合约之后，我们将按照本《用户服务协议》给出相关通知。<br/>
   <h2>第十一条 管辖约定</h2>
<b>本《用户服务协议》适用中国法律。根据中华人民共和国法律具有管辖权的法院管辖关于本《用户服务协议》的违约，终止，履行，解释或有效性，或者网站，八号幸福APP平台的使用所产生的或与其相关的任何冲突，赔偿或纠纷（统称为“争议”）。</b>";
    return json(['state'=>2558,'data'=>['protocol'=>$ddd],'mesg'=>'操作完成']);

  } 
}
