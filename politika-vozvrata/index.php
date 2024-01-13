<?php

require_once('../core/initialize.php'); 
$page_title = "Политика возврата в Прокате палаток: Прокат палаток в Санкт-Петербурге";
$page_keywords = "отказаться от заказа, некачественное снаряжение, что делать если не понравилось обслуживание";
$page_description = "Статья описывает процесс отказа от обслуживания и возврата уплаченных средств в Прокате палаток";
$page_breadcrumbs = "Политика возврата";
$page_content_class = "infopage";

// css
$aux_css_url = url_for(WWW_CSS . '/infopage.css');
$to_include = '<link rel="stylesheet" type="text/css" href="' . $aux_css_url . '">';
include(TPL_PATH . '/header.php');
include(TPL_PATH . '/left.php');

?>

<!-- center -->
<section id="center">
    <article>
        <h1>Политика возврата в Прокате палаток</h1>

        <p>Прокат палаток вернёт Вам потраченную на прокат снаряжения сумму если Вас что-либо не устроило в обслуживании: не подошло снаряжение, не понравилось его состояние или качество, есть любые другие претензии к обслуживанию и взаимодействию. Достаточно будет объяснить причины возврата лично сотруднику проката при сдаче снаряжения либо отправить нам сообщение в любом мессенджере. Возврат средств будет осуществлён не позднее 24 часов с момента обращения, но, как правило - сразу при обращении.</p><br>
        <p>Возврат средств не осуществляется за доставку снаряжения сторонними сервисами (такими, как Яндекс.Go и т.п.).</p>

    </article>
</section>
<!-- /center -->

<?php include(TPL_PATH . '/right.php'); ?>
<?php include(TPL_PATH . '/footer.php'); ?>

