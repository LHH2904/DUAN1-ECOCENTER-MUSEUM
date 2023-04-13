<?php
$title='Dashboard page';
$baseUrl = '';
require_once('layouts/header.php');
$sql = "Select count(*) as num from orders";
$Orders = executeResult($sql,true);
$sql = "Select count(*) as num from product";
$Products = executeResult($sql,true);
$sql = "Select count(*) as num from ticket";
$Tickets = executeResult($sql,true);
$sql = "Select count(*) as num from user where role_id = 2";
$Users = executeResult($sql,true);
$sql = "Select Orders.total_money from orders";
$totalmoney = executeResult($sql);
$total  = 0;
foreach ($totalmoney as $item){
    $total += $item['total_money'];
}
$user = getUserToken();
?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Congratulations <?=$user['fullname']?> 🎉</h5>
                                <p class="mb-4">You have done <span class="fw-bold">72%</span> more sales today. Check
                                    your new badge in your profile.</p>

                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template-free/demo/assets/img/illustrations/man-with-laptop-light.png"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template-free/demo/assets/img/icons/unicons/chart-success.png"
                                            alt="chart success" class="rounded">
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">ORDERS</span>
                                <h3 class="card-title mb-2"><?=$Orders['num']?></h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                    +72.80%</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template-free/demo/assets/img/icons/unicons/wallet-info.png"
                                            alt="Credit Card" class="rounded">
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span>Products</span>
                                <h3 class="card-title text-nowrap mb-1"><?=$Products['num']?></h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                    +28.42%</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Revenue -->
            <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-8">
                            <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                            <div id="totalRevenueChart" class="px-2" style="min-height: 315px;">
                                <div id="apexchartsai28fise"
                                    class="apexcharts-canvas apexchartsai28fise apexcharts-theme-light"
                                    style="width: 492px; height: 300px;"><svg id="SvgjsSvg1722" width="492" height="300"
                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                        class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                        style="background: transparent;">
                                        <g id="SvgjsG1724" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(53.80000114440918, 52)">
                                            <defs id="SvgjsDefs1723">
                                                <linearGradient id="SvgjsLinearGradient1728" x1="0" y1="0" x2="0"
                                                    y2="1">
                                                    <stop id="SvgjsStop1729" stop-opacity="0.4"
                                                        stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                    <stop id="SvgjsStop1730" stop-opacity="0.5"
                                                        stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                    <stop id="SvgjsStop1731" stop-opacity="0.5"
                                                        stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                </linearGradient>
                                                <clipPath id="gridRectMaskai28fise">
                                                    <rect id="SvgjsRect1733" width="428.1999988555908"
                                                        height="223.70079907417298" x="-5" y="-3" rx="0" ry="0"
                                                        opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMaskai28fise"></clipPath>
                                                <clipPath id="nonForecastMaskai28fise"></clipPath>
                                                <clipPath id="gridRectMarkerMaskai28fise">
                                                    <rect id="SvgjsRect1734" width="422.1999988555908"
                                                        height="221.70079907417298" x="-2" y="-2" rx="0" ry="0"
                                                        opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fff"></rect>
                                                </clipPath>
                                            </defs>
                                            <rect id="SvgjsRect1732" width="22.104857082366944"
                                                height="217.70079907417298" x="0" y="0" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke-dasharray="3"
                                                fill="url(#SvgjsLinearGradient1728)" class="apexcharts-xcrosshairs"
                                                y2="217.70079907417298" filter="none" fill-opacity="0.9"></rect>
                                            <g id="SvgjsG1754" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                <g id="SvgjsG1755" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, -4)"><text id="SvgjsText1757"
                                                        font-family="Helvetica, Arial, sans-serif" x="29.87142848968506"
                                                        y="246.70079907417298" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="13px" font-weight="400"
                                                        fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1758">Jan</tspan>
                                                        <title>Jan</title>
                                                    </text><text id="SvgjsText1760"
                                                        font-family="Helvetica, Arial, sans-serif" x="89.61428546905518"
                                                        y="246.70079907417298" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="13px" font-weight="400"
                                                        fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1761">Feb</tspan>
                                                        <title>Feb</title>
                                                    </text><text id="SvgjsText1763"
                                                        font-family="Helvetica, Arial, sans-serif" x="149.3571424484253"
                                                        y="246.70079907417298" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="13px" font-weight="400"
                                                        fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1764">Mar</tspan>
                                                        <title>Mar</title>
                                                    </text><text id="SvgjsText1766"
                                                        font-family="Helvetica, Arial, sans-serif" x="209.0999994277954"
                                                        y="246.70079907417298" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="13px" font-weight="400"
                                                        fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1767">Apr</tspan>
                                                        <title>Apr</title>
                                                    </text><text id="SvgjsText1769"
                                                        font-family="Helvetica, Arial, sans-serif" x="268.8428564071655"
                                                        y="246.70079907417298" text-anchor="middle"
                                                        dominant-baseline="auto" font-size="13px" font-weight="400"
                                                        fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1770">May</tspan>
                                                        <title>May</title>
                                                    </text><text id="SvgjsText1772"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="328.58571338653564" y="246.70079907417298"
                                                        text-anchor="middle" dominant-baseline="auto" font-size="13px"
                                                        font-weight="400" fill="#a1acb8"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1773">Jun</tspan>
                                                        <title>Jun</title>
                                                    </text><text id="SvgjsText1775"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="388.32857036590576" y="246.70079907417298"
                                                        text-anchor="middle" dominant-baseline="auto" font-size="13px"
                                                        font-weight="400" fill="#a1acb8"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1776">Jul</tspan>
                                                        <title>Jul</title>
                                                    </text></g>
                                            </g>
                                            <g id="SvgjsG1791" class="apexcharts-grid">
                                                <g id="SvgjsG1792" class="apexcharts-gridlines-horizontal">
                                                    <line id="SvgjsLine1794" x1="0" y1="0" x2="418.1999988555908" y2="0"
                                                        stroke="#eceef1" stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1795" x1="0" y1="43.540159814834595"
                                                        x2="418.1999988555908" y2="43.540159814834595" stroke="#eceef1"
                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1796" x1="0" y1="87.08031962966919"
                                                        x2="418.1999988555908" y2="87.08031962966919" stroke="#eceef1"
                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1797" x1="0" y1="130.6204794445038"
                                                        x2="418.1999988555908" y2="130.6204794445038" stroke="#eceef1"
                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1798" x1="0" y1="174.16063925933838"
                                                        x2="418.1999988555908" y2="174.16063925933838" stroke="#eceef1"
                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1799" x1="0" y1="217.70079907417298"
                                                        x2="418.1999988555908" y2="217.70079907417298" stroke="#eceef1"
                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG1793" class="apexcharts-gridlines-vertical"></g>
                                                <line id="SvgjsLine1801" x1="0" y1="217.70079907417298"
                                                    x2="418.1999988555908" y2="217.70079907417298" stroke="transparent"
                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                <line id="SvgjsLine1800" x1="0" y1="1" x2="0" y2="217.70079907417298"
                                                    stroke="transparent" stroke-dasharray="0" stroke-linecap="butt">
                                                </line>
                                            </g>
                                            <g id="SvgjsG1735" class="apexcharts-bar-series apexcharts-plot-series">
                                                <g id="SvgjsG1736" class="apexcharts-series" seriesName="2021" rel="1"
                                                    data:realIndex="0">
                                                    <path id="SvgjsPath1738"
                                                        d="M 18.818999948501585 120.62047944450379L 18.818999948501585 62.24819177780151Q 18.818999948501585 52.24819177780151 28.818999948501585 52.24819177780151L 24.923857030868533 52.24819177780151Q 34.92385703086853 52.24819177780151 34.92385703086853 62.24819177780151L 34.92385703086853 62.24819177780151L 34.92385703086853 120.62047944450379Q 34.92385703086853 130.6204794445038 24.923857030868533 130.6204794445038L 28.818999948501585 130.6204794445038Q 18.818999948501585 130.6204794445038 18.818999948501585 120.62047944450379z"
                                                        fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                        stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskai28fise)"
                                                        pathTo="M 18.818999948501585 120.62047944450379L 18.818999948501585 62.24819177780151Q 18.818999948501585 52.24819177780151 28.818999948501585 52.24819177780151L 24.923857030868533 52.24819177780151Q 34.92385703086853 52.24819177780151 34.92385703086853 62.24819177780151L 34.92385703086853 62.24819177780151L 34.92385703086853 120.62047944450379Q 34.92385703086853 130.6204794445038 24.923857030868533 130.6204794445038L 28.818999948501585 130.6204794445038Q 18.818999948501585 130.6204794445038 18.818999948501585 120.62047944450379z"
                                                        pathFrom="M 18.818999948501585 120.62047944450379L 18.818999948501585 120.62047944450379L 34.92385703086853 120.62047944450379L 34.92385703086853 120.62047944450379L 34.92385703086853 120.62047944450379L 34.92385703086853 120.62047944450379L 34.92385703086853 120.62047944450379L 18.818999948501585 120.62047944450379"
                                                        cy="52.24819177780151" cx="75.5618569278717" j="0" val="18"
                                                        barHeight="78.37228766670228" barWidth="22.104857082366944">
                                                    </path>
                                                    <path id="SvgjsPath1739"
                                                        d="M 78.5618569278717 120.62047944450379L 78.5618569278717 110.14236757411956Q 78.5618569278717 100.14236757411956 88.5618569278717 100.14236757411956L 84.66671401023865 100.14236757411956Q 94.66671401023865 100.14236757411956 94.66671401023865 110.14236757411956L 94.66671401023865 110.14236757411956L 94.66671401023865 120.62047944450379Q 94.66671401023865 130.6204794445038 84.66671401023865 130.6204794445038L 88.5618569278717 130.6204794445038Q 78.5618569278717 130.6204794445038 78.5618569278717 120.62047944450379z"
                                                        fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                        stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskai28fise)"
                                                        pathTo="M 78.5618569278717 120.62047944450379L 78.5618569278717 110.14236757411956Q 78.5618569278717 100.14236757411956 88.5618569278717 100.14236757411956L 84.66671401023865 100.14236757411956Q 94.66671401023865 100.14236757411956 94.66671401023865 110.14236757411956L 94.66671401023865 110.14236757411956L 94.66671401023865 120.62047944450379Q 94.66671401023865 130.6204794445038 84.66671401023865 130.6204794445038L 88.5618569278717 130.6204794445038Q 78.5618569278717 130.6204794445038 78.5618569278717 120.62047944450379z"
                                                        pathFrom="M 78.5618569278717 120.62047944450379L 78.5618569278717 120.62047944450379L 94.66671401023865 120.62047944450379L 94.66671401023865 120.62047944450379L 94.66671401023865 120.62047944450379L 94.66671401023865 120.62047944450379L 94.66671401023865 120.62047944450379L 78.5618569278717 120.62047944450379"
                                                        cy="100.14236757411956" cx="135.30471390724182" j="1" val="7"
                                                        barHeight="30.478111870384218" barWidth="22.104857082366944">
                                                    </path>
                                                    <path id="SvgjsPath1740"
                                                        d="M 138.30471390724182 120.62047944450379L 138.30471390724182 75.3102397222519Q 138.30471390724182 65.3102397222519 148.30471390724182 65.3102397222519L 144.40957098960877 65.3102397222519Q 154.40957098960877 65.3102397222519 154.40957098960877 75.3102397222519L 154.40957098960877 75.3102397222519L 154.40957098960877 120.62047944450379Q 154.40957098960877 130.6204794445038 144.40957098960877 130.6204794445038L 148.30471390724182 130.6204794445038Q 138.30471390724182 130.6204794445038 138.30471390724182 120.62047944450379z"
                                                        fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                        stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskai28fise)"
                                                        pathTo="M 138.30471390724182 120.62047944450379L 138.30471390724182 75.3102397222519Q 138.30471390724182 65.3102397222519 148.30471390724182 65.3102397222519L 144.40957098960877 65.3102397222519Q 154.40957098960877 65.3102397222519 154.40957098960877 75.3102397222519L 154.40957098960877 75.3102397222519L 154.40957098960877 120.62047944450379Q 154.40957098960877 130.6204794445038 144.40957098960877 130.6204794445038L 148.30471390724182 130.6204794445038Q 138.30471390724182 130.6204794445038 138.30471390724182 120.62047944450379z"
                                                        pathFrom="M 138.30471390724182 120.62047944450379L 138.30471390724182 120.62047944450379L 154.40957098960877 120.62047944450379L 154.40957098960877 120.62047944450379L 154.40957098960877 120.62047944450379L 154.40957098960877 120.62047944450379L 154.40957098960877 120.62047944450379L 138.30471390724182 120.62047944450379"
                                                        cy="65.3102397222519" cx="195.04757088661194" j="2" val="15"
                                                        barHeight="65.3102397222519" barWidth="22.104857082366944">
                                                    </path>
                                                    <path id="SvgjsPath1741"
                                                        d="M 198.04757088661194 120.62047944450379L 198.04757088661194 14.354015981483457Q 198.04757088661194 4.354015981483457 208.04757088661194 4.354015981483457L 204.15242796897888 4.354015981483457Q 214.15242796897888 4.354015981483457 214.15242796897888 14.354015981483457L 214.15242796897888 14.354015981483457L 214.15242796897888 120.62047944450379Q 214.15242796897888 130.6204794445038 204.15242796897888 130.6204794445038L 208.04757088661194 130.6204794445038Q 198.04757088661194 130.6204794445038 198.04757088661194 120.62047944450379z"
                                                        fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                        stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskai28fise)"
                                                        pathTo="M 198.04757088661194 120.62047944450379L 198.04757088661194 14.354015981483457Q 198.04757088661194 4.354015981483457 208.04757088661194 4.354015981483457L 204.15242796897888 4.354015981483457Q 214.15242796897888 4.354015981483457 214.15242796897888 14.354015981483457L 214.15242796897888 14.354015981483457L 214.15242796897888 120.62047944450379Q 214.15242796897888 130.6204794445038 204.15242796897888 130.6204794445038L 208.04757088661194 130.6204794445038Q 198.04757088661194 130.6204794445038 198.04757088661194 120.62047944450379z"
                                                        pathFrom="M 198.04757088661194 120.62047944450379L 198.04757088661194 120.62047944450379L 214.15242796897888 120.62047944450379L 214.15242796897888 120.62047944450379L 214.15242796897888 120.62047944450379L 214.15242796897888 120.62047944450379L 214.15242796897888 120.62047944450379L 198.04757088661194 120.62047944450379"
                                                        cy="4.354015981483457" cx="254.79042786598205" j="3" val="29"
                                                        barHeight="126.26646346302033" barWidth="22.104857082366944">
                                                    </path>
                                                    <path id="SvgjsPath1742"
                                                        d="M 257.79042786598205 120.62047944450379L 257.79042786598205 62.24819177780151Q 257.79042786598205 52.24819177780151 267.79042786598205 52.24819177780151L 263.895284948349 52.24819177780151Q 273.895284948349 52.24819177780151 273.895284948349 62.24819177780151L 273.895284948349 62.24819177780151L 273.895284948349 120.62047944450379Q 273.895284948349 130.6204794445038 263.895284948349 130.6204794445038L 267.79042786598205 130.6204794445038Q 257.79042786598205 130.6204794445038 257.79042786598205 120.62047944450379z"
                                                        fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                        stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskai28fise)"
                                                        pathTo="M 257.79042786598205 120.62047944450379L 257.79042786598205 62.24819177780151Q 257.79042786598205 52.24819177780151 267.79042786598205 52.24819177780151L 263.895284948349 52.24819177780151Q 273.895284948349 52.24819177780151 273.895284948349 62.24819177780151L 273.895284948349 62.24819177780151L 273.895284948349 120.62047944450379Q 273.895284948349 130.6204794445038 263.895284948349 130.6204794445038L 267.79042786598205 130.6204794445038Q 257.79042786598205 130.6204794445038 257.79042786598205 120.62047944450379z"
                                                        pathFrom="M 257.79042786598205 120.62047944450379L 257.79042786598205 120.62047944450379L 273.895284948349 120.62047944450379L 273.895284948349 120.62047944450379L 273.895284948349 120.62047944450379L 273.895284948349 120.62047944450379L 273.895284948349 120.62047944450379L 257.79042786598205 120.62047944450379"
                                                        cy="52.24819177780151" cx="314.53328484535217" j="4" val="18"
                                                        barHeight="78.37228766670228" barWidth="22.104857082366944">
                                                    </path>
                                                    <path id="SvgjsPath1743"
                                                        d="M 317.53328484535217 120.62047944450379L 317.53328484535217 88.37228766670228Q 317.53328484535217 78.37228766670228 327.53328484535217 78.37228766670228L 323.6381419277191 78.37228766670228Q 333.6381419277191 78.37228766670228 333.6381419277191 88.37228766670228L 333.6381419277191 88.37228766670228L 333.6381419277191 120.62047944450379Q 333.6381419277191 130.6204794445038 323.6381419277191 130.6204794445038L 327.53328484535217 130.6204794445038Q 317.53328484535217 130.6204794445038 317.53328484535217 120.62047944450379z"
                                                        fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                        stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskai28fise)"
                                                        pathTo="M 317.53328484535217 120.62047944450379L 317.53328484535217 88.37228766670228Q 317.53328484535217 78.37228766670228 327.53328484535217 78.37228766670228L 323.6381419277191 78.37228766670228Q 333.6381419277191 78.37228766670228 333.6381419277191 88.37228766670228L 333.6381419277191 88.37228766670228L 333.6381419277191 120.62047944450379Q 333.6381419277191 130.6204794445038 323.6381419277191 130.6204794445038L 327.53328484535217 130.6204794445038Q 317.53328484535217 130.6204794445038 317.53328484535217 120.62047944450379z"
                                                        pathFrom="M 317.53328484535217 120.62047944450379L 317.53328484535217 120.62047944450379L 333.6381419277191 120.62047944450379L 333.6381419277191 120.62047944450379L 333.6381419277191 120.62047944450379L 333.6381419277191 120.62047944450379L 333.6381419277191 120.62047944450379L 317.53328484535217 120.62047944450379"
                                                        cy="78.37228766670228" cx="374.2761418247223" j="5" val="12"
                                                        barHeight="52.248191777801516" barWidth="22.104857082366944">
                                                    </path>
                                                    <path id="SvgjsPath1744"
                                                        d="M 377.2761418247223 120.62047944450379L 377.2761418247223 101.43433561115265Q 377.2761418247223 91.43433561115265 387.2761418247223 91.43433561115265L 383.38099890708924 91.43433561115265Q 393.38099890708924 91.43433561115265 393.38099890708924 101.43433561115265L 393.38099890708924 101.43433561115265L 393.38099890708924 120.62047944450379Q 393.38099890708924 130.6204794445038 383.38099890708924 130.6204794445038L 387.2761418247223 130.6204794445038Q 377.2761418247223 130.6204794445038 377.2761418247223 120.62047944450379z"
                                                        fill="rgba(105,108,255,0.85)" fill-opacity="1" stroke="#ffffff"
                                                        stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskai28fise)"
                                                        pathTo="M 377.2761418247223 120.62047944450379L 377.2761418247223 101.43433561115265Q 377.2761418247223 91.43433561115265 387.2761418247223 91.43433561115265L 383.38099890708924 91.43433561115265Q 393.38099890708924 91.43433561115265 393.38099890708924 101.43433561115265L 393.38099890708924 101.43433561115265L 393.38099890708924 120.62047944450379Q 393.38099890708924 130.6204794445038 383.38099890708924 130.6204794445038L 387.2761418247223 130.6204794445038Q 377.2761418247223 130.6204794445038 377.2761418247223 120.62047944450379z"
                                                        pathFrom="M 377.2761418247223 120.62047944450379L 377.2761418247223 120.62047944450379L 393.38099890708924 120.62047944450379L 393.38099890708924 120.62047944450379L 393.38099890708924 120.62047944450379L 393.38099890708924 120.62047944450379L 393.38099890708924 120.62047944450379L 377.2761418247223 120.62047944450379"
                                                        cy="91.43433561115265" cx="434.0189988040924" j="6" val="9"
                                                        barHeight="39.18614383335114" barWidth="22.104857082366944">
                                                    </path>
                                                </g>
                                                <g id="SvgjsG1745" class="apexcharts-series" seriesName="2020" rel="2"
                                                    data:realIndex="1">
                                                    <path id="SvgjsPath1747"
                                                        d="M 18.818999948501585 150.6204794445038L 18.818999948501585 187.22268720378878Q 18.818999948501585 197.22268720378878 28.818999948501585 197.22268720378878L 24.923857030868533 197.22268720378878Q 34.92385703086853 197.22268720378878 34.92385703086853 187.22268720378878L 34.92385703086853 187.22268720378878L 34.92385703086853 150.6204794445038Q 34.92385703086853 140.6204794445038 24.923857030868533 140.6204794445038L 28.818999948501585 140.6204794445038Q 18.818999948501585 140.6204794445038 18.818999948501585 150.6204794445038z"
                                                        fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                        stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskai28fise)"
                                                        pathTo="M 18.818999948501585 150.6204794445038L 18.818999948501585 187.22268720378878Q 18.818999948501585 197.22268720378878 28.818999948501585 197.22268720378878L 24.923857030868533 197.22268720378878Q 34.92385703086853 197.22268720378878 34.92385703086853 187.22268720378878L 34.92385703086853 187.22268720378878L 34.92385703086853 150.6204794445038Q 34.92385703086853 140.6204794445038 24.923857030868533 140.6204794445038L 28.818999948501585 140.6204794445038Q 18.818999948501585 140.6204794445038 18.818999948501585 150.6204794445038z"
                                                        pathFrom="M 18.818999948501585 150.6204794445038L 18.818999948501585 150.6204794445038L 34.92385703086853 150.6204794445038L 34.92385703086853 150.6204794445038L 34.92385703086853 150.6204794445038L 34.92385703086853 150.6204794445038L 34.92385703086853 150.6204794445038L 18.818999948501585 150.6204794445038"
                                                        cy="177.22268720378878" cx="75.5618569278717" j="0" val="-13"
                                                        barHeight="-56.60220775928498" barWidth="22.104857082366944">
                                                    </path>
                                                    <path id="SvgjsPath1748"
                                                        d="M 78.5618569278717 150.6204794445038L 78.5618569278717 208.99276711120606Q 78.5618569278717 218.99276711120606 88.5618569278717 218.99276711120606L 84.66671401023865 218.99276711120606Q 94.66671401023865 218.99276711120606 94.66671401023865 208.99276711120606L 94.66671401023865 208.99276711120606L 94.66671401023865 150.6204794445038Q 94.66671401023865 140.6204794445038 84.66671401023865 140.6204794445038L 88.5618569278717 140.6204794445038Q 78.5618569278717 140.6204794445038 78.5618569278717 150.6204794445038z"
                                                        fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                        stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskai28fise)"
                                                        pathTo="M 78.5618569278717 150.6204794445038L 78.5618569278717 208.99276711120606Q 78.5618569278717 218.99276711120606 88.5618569278717 218.99276711120606L 84.66671401023865 218.99276711120606Q 94.66671401023865 218.99276711120606 94.66671401023865 208.99276711120606L 94.66671401023865 208.99276711120606L 94.66671401023865 150.6204794445038Q 94.66671401023865 140.6204794445038 84.66671401023865 140.6204794445038L 88.5618569278717 140.6204794445038Q 78.5618569278717 140.6204794445038 78.5618569278717 150.6204794445038z"
                                                        pathFrom="M 78.5618569278717 150.6204794445038L 78.5618569278717 150.6204794445038L 94.66671401023865 150.6204794445038L 94.66671401023865 150.6204794445038L 94.66671401023865 150.6204794445038L 94.66671401023865 150.6204794445038L 94.66671401023865 150.6204794445038L 78.5618569278717 150.6204794445038"
                                                        cy="198.99276711120606" cx="135.30471390724182" j="1" val="-18"
                                                        barHeight="-78.37228766670228" barWidth="22.104857082366944">
                                                    </path>
                                                    <path id="SvgjsPath1749"
                                                        d="M 138.30471390724182 150.6204794445038L 138.30471390724182 169.80662327785492Q 138.30471390724182 179.80662327785492 148.30471390724182 179.80662327785492L 144.40957098960877 179.80662327785492Q 154.40957098960877 179.80662327785492 154.40957098960877 169.80662327785492L 154.40957098960877 169.80662327785492L 154.40957098960877 150.6204794445038Q 154.40957098960877 140.6204794445038 144.40957098960877 140.6204794445038L 148.30471390724182 140.6204794445038Q 138.30471390724182 140.6204794445038 138.30471390724182 150.6204794445038z"
                                                        fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                        stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskai28fise)"
                                                        pathTo="M 138.30471390724182 150.6204794445038L 138.30471390724182 169.80662327785492Q 138.30471390724182 179.80662327785492 148.30471390724182 179.80662327785492L 144.40957098960877 179.80662327785492Q 154.40957098960877 179.80662327785492 154.40957098960877 169.80662327785492L 154.40957098960877 169.80662327785492L 154.40957098960877 150.6204794445038Q 154.40957098960877 140.6204794445038 144.40957098960877 140.6204794445038L 148.30471390724182 140.6204794445038Q 138.30471390724182 140.6204794445038 138.30471390724182 150.6204794445038z"
                                                        pathFrom="M 138.30471390724182 150.6204794445038L 138.30471390724182 150.6204794445038L 154.40957098960877 150.6204794445038L 154.40957098960877 150.6204794445038L 154.40957098960877 150.6204794445038L 154.40957098960877 150.6204794445038L 154.40957098960877 150.6204794445038L 138.30471390724182 150.6204794445038"
                                                        cy="159.80662327785492" cx="195.04757088661194" j="2" val="-9"
                                                        barHeight="-39.18614383335114" barWidth="22.104857082366944">
                                                    </path>
                                                    <path id="SvgjsPath1750"
                                                        d="M 198.04757088661194 150.6204794445038L 198.04757088661194 191.5767031852722Q 198.04757088661194 201.5767031852722 208.04757088661194 201.5767031852722L 204.15242796897888 201.5767031852722Q 214.15242796897888 201.5767031852722 214.15242796897888 191.5767031852722L 214.15242796897888 191.5767031852722L 214.15242796897888 150.6204794445038Q 214.15242796897888 140.6204794445038 204.15242796897888 140.6204794445038L 208.04757088661194 140.6204794445038Q 198.04757088661194 140.6204794445038 198.04757088661194 150.6204794445038z"
                                                        fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                        stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskai28fise)"
                                                        pathTo="M 198.04757088661194 150.6204794445038L 198.04757088661194 191.5767031852722Q 198.04757088661194 201.5767031852722 208.04757088661194 201.5767031852722L 204.15242796897888 201.5767031852722Q 214.15242796897888 201.5767031852722 214.15242796897888 191.5767031852722L 214.15242796897888 191.5767031852722L 214.15242796897888 150.6204794445038Q 214.15242796897888 140.6204794445038 204.15242796897888 140.6204794445038L 208.04757088661194 140.6204794445038Q 198.04757088661194 140.6204794445038 198.04757088661194 150.6204794445038z"
                                                        pathFrom="M 198.04757088661194 150.6204794445038L 198.04757088661194 150.6204794445038L 214.15242796897888 150.6204794445038L 214.15242796897888 150.6204794445038L 214.15242796897888 150.6204794445038L 214.15242796897888 150.6204794445038L 214.15242796897888 150.6204794445038L 198.04757088661194 150.6204794445038"
                                                        cy="181.5767031852722" cx="254.79042786598205" j="3" val="-14"
                                                        barHeight="-60.956223740768436" barWidth="22.104857082366944">
                                                    </path>
                                                    <path id="SvgjsPath1751"
                                                        d="M 257.79042786598205 150.6204794445038L 257.79042786598205 152.39055935192107Q 257.79042786598205 162.39055935192107 267.79042786598205 162.39055935192107L 263.895284948349 162.39055935192107Q 273.895284948349 162.39055935192107 273.895284948349 152.39055935192107L 273.895284948349 152.39055935192107L 273.895284948349 150.6204794445038Q 273.895284948349 140.6204794445038 263.895284948349 140.6204794445038L 267.79042786598205 140.6204794445038Q 257.79042786598205 140.6204794445038 257.79042786598205 150.6204794445038z"
                                                        fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                        stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskai28fise)"
                                                        pathTo="M 257.79042786598205 150.6204794445038L 257.79042786598205 152.39055935192107Q 257.79042786598205 162.39055935192107 267.79042786598205 162.39055935192107L 263.895284948349 162.39055935192107Q 273.895284948349 162.39055935192107 273.895284948349 152.39055935192107L 273.895284948349 152.39055935192107L 273.895284948349 150.6204794445038Q 273.895284948349 140.6204794445038 263.895284948349 140.6204794445038L 267.79042786598205 140.6204794445038Q 257.79042786598205 140.6204794445038 257.79042786598205 150.6204794445038z"
                                                        pathFrom="M 257.79042786598205 150.6204794445038L 257.79042786598205 150.6204794445038L 273.895284948349 150.6204794445038L 273.895284948349 150.6204794445038L 273.895284948349 150.6204794445038L 273.895284948349 150.6204794445038L 273.895284948349 150.6204794445038L 257.79042786598205 150.6204794445038"
                                                        cy="142.39055935192107" cx="314.53328484535217" j="4" val="-5"
                                                        barHeight="-21.770079907417298" barWidth="22.104857082366944">
                                                    </path>
                                                    <path id="SvgjsPath1752"
                                                        d="M 317.53328484535217 150.6204794445038L 317.53328484535217 204.6387511297226Q 317.53328484535217 214.6387511297226 327.53328484535217 214.6387511297226L 323.6381419277191 214.6387511297226Q 333.6381419277191 214.6387511297226 333.6381419277191 204.6387511297226L 333.6381419277191 204.6387511297226L 333.6381419277191 150.6204794445038Q 333.6381419277191 140.6204794445038 323.6381419277191 140.6204794445038L 327.53328484535217 140.6204794445038Q 317.53328484535217 140.6204794445038 317.53328484535217 150.6204794445038z"
                                                        fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                        stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskai28fise)"
                                                        pathTo="M 317.53328484535217 150.6204794445038L 317.53328484535217 204.6387511297226Q 317.53328484535217 214.6387511297226 327.53328484535217 214.6387511297226L 323.6381419277191 214.6387511297226Q 333.6381419277191 214.6387511297226 333.6381419277191 204.6387511297226L 333.6381419277191 204.6387511297226L 333.6381419277191 150.6204794445038Q 333.6381419277191 140.6204794445038 323.6381419277191 140.6204794445038L 327.53328484535217 140.6204794445038Q 317.53328484535217 140.6204794445038 317.53328484535217 150.6204794445038z"
                                                        pathFrom="M 317.53328484535217 150.6204794445038L 317.53328484535217 150.6204794445038L 333.6381419277191 150.6204794445038L 333.6381419277191 150.6204794445038L 333.6381419277191 150.6204794445038L 333.6381419277191 150.6204794445038L 333.6381419277191 150.6204794445038L 317.53328484535217 150.6204794445038"
                                                        cy="194.6387511297226" cx="374.2761418247223" j="5" val="-17"
                                                        barHeight="-74.01827168521882" barWidth="22.104857082366944">
                                                    </path>
                                                    <path id="SvgjsPath1753"
                                                        d="M 377.2761418247223 150.6204794445038L 377.2761418247223 195.9307191667557Q 377.2761418247223 205.9307191667557 387.2761418247223 205.9307191667557L 383.38099890708924 205.9307191667557Q 393.38099890708924 205.9307191667557 393.38099890708924 195.9307191667557L 393.38099890708924 195.9307191667557L 393.38099890708924 150.6204794445038Q 393.38099890708924 140.6204794445038 383.38099890708924 140.6204794445038L 387.2761418247223 140.6204794445038Q 377.2761418247223 140.6204794445038 377.2761418247223 150.6204794445038z"
                                                        fill="rgba(3,195,236,0.85)" fill-opacity="1" stroke="#ffffff"
                                                        stroke-opacity="1" stroke-linecap="round" stroke-width="6"
                                                        stroke-dasharray="0" class="apexcharts-bar-area" index="1"
                                                        clip-path="url(#gridRectMaskai28fise)"
                                                        pathTo="M 377.2761418247223 150.6204794445038L 377.2761418247223 195.9307191667557Q 377.2761418247223 205.9307191667557 387.2761418247223 205.9307191667557L 383.38099890708924 205.9307191667557Q 393.38099890708924 205.9307191667557 393.38099890708924 195.9307191667557L 393.38099890708924 195.9307191667557L 393.38099890708924 150.6204794445038Q 393.38099890708924 140.6204794445038 383.38099890708924 140.6204794445038L 387.2761418247223 140.6204794445038Q 377.2761418247223 140.6204794445038 377.2761418247223 150.6204794445038z"
                                                        pathFrom="M 377.2761418247223 150.6204794445038L 377.2761418247223 150.6204794445038L 393.38099890708924 150.6204794445038L 393.38099890708924 150.6204794445038L 393.38099890708924 150.6204794445038L 393.38099890708924 150.6204794445038L 393.38099890708924 150.6204794445038L 377.2761418247223 150.6204794445038"
                                                        cy="185.9307191667557" cx="434.0189988040924" j="6" val="-15"
                                                        barHeight="-65.3102397222519" barWidth="22.104857082366944">
                                                    </path>
                                                </g>
                                                <g id="SvgjsG1737" class="apexcharts-datalabels" data:realIndex="0"></g>
                                                <g id="SvgjsG1746" class="apexcharts-datalabels" data:realIndex="1"></g>
                                            </g>
                                            <line id="SvgjsLine1802" x1="0" y1="0" x2="418.1999988555908" y2="0"
                                                stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine1803" x1="0" y1="0" x2="418.1999988555908" y2="0"
                                                stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG1804" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG1805" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG1806" class="apexcharts-point-annotations"></g>
                                        </g>
                                        <g id="SvgjsG1777" class="apexcharts-yaxis" rel="0"
                                            transform="translate(15.80000114440918, 0)">
                                            <g id="SvgjsG1778" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1779"
                                                    font-family="Helvetica, Arial, sans-serif" x="20" y="53.5"
                                                    text-anchor="end" dominant-baseline="auto" font-size="13px"
                                                    font-weight="400" fill="#a1acb8"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1780">30</tspan>
                                                    <title>30</title>
                                                </text><text id="SvgjsText1781"
                                                    font-family="Helvetica, Arial, sans-serif" x="20"
                                                    y="97.0401598148346" text-anchor="end" dominant-baseline="auto"
                                                    font-size="13px" font-weight="400" fill="#a1acb8"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1782">20</tspan>
                                                    <title>20</title>
                                                </text><text id="SvgjsText1783"
                                                    font-family="Helvetica, Arial, sans-serif" x="20"
                                                    y="140.5803196296692" text-anchor="end" dominant-baseline="auto"
                                                    font-size="13px" font-weight="400" fill="#a1acb8"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1784">10</tspan>
                                                    <title>10</title>
                                                </text><text id="SvgjsText1785"
                                                    font-family="Helvetica, Arial, sans-serif" x="20"
                                                    y="184.1204794445038" text-anchor="end" dominant-baseline="auto"
                                                    font-size="13px" font-weight="400" fill="#a1acb8"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1786">0</tspan>
                                                    <title>0</title>
                                                </text><text id="SvgjsText1787"
                                                    font-family="Helvetica, Arial, sans-serif" x="20"
                                                    y="227.66063925933838" text-anchor="end" dominant-baseline="auto"
                                                    font-size="13px" font-weight="400" fill="#a1acb8"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1788">-10</tspan>
                                                    <title>-10</title>
                                                </text><text id="SvgjsText1789"
                                                    font-family="Helvetica, Arial, sans-serif" x="20"
                                                    y="271.200799074173" text-anchor="end" dominant-baseline="auto"
                                                    font-size="13px" font-weight="400" fill="#a1acb8"
                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1790">-20</tspan>
                                                    <title>-20</title>
                                                </text></g>
                                        </g>
                                        <g id="SvgjsG1725" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                        <div class="apexcharts-tooltip-title"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(105, 108, 255);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(3, 195, 236);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 509px; height: 377px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                            id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            2022
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                            <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                            <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                            <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="growthChart" style="min-height: 154.875px;">
                                <div id="apexchartsyz61p6mg"
                                    class="apexcharts-canvas apexchartsyz61p6mg apexcharts-theme-light"
                                    style="width: 508px; height: 154.875px;"><svg id="SvgjsSvg1807" width="508"
                                        height="154.875" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                        class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                        style="background: transparent;">
                                        <g id="SvgjsG1809" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(147, -25)">
                                            <defs id="SvgjsDefs1808">
                                                <clipPath id="gridRectMaskyz61p6mg">
                                                    <rect id="SvgjsRect1811" width="222" height="285" x="-3" y="-1"
                                                        rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMaskyz61p6mg"></clipPath>
                                                <clipPath id="nonForecastMaskyz61p6mg"></clipPath>
                                                <clipPath id="gridRectMarkerMaskyz61p6mg">
                                                    <rect id="SvgjsRect1812" width="220" height="287" x="-2" y="-2"
                                                        rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <linearGradient id="SvgjsLinearGradient1817" x1="1" y1="0" x2="0"
                                                    y2="1">
                                                    <stop id="SvgjsStop1818" stop-opacity="1"
                                                        stop-color="rgba(105,108,255,1)" offset="0.3"></stop>
                                                    <stop id="SvgjsStop1819" stop-opacity="0.6"
                                                        stop-color="rgba(255,255,255,0.6)" offset="0.7"></stop>
                                                    <stop id="SvgjsStop1820" stop-opacity="0.6"
                                                        stop-color="rgba(255,255,255,0.6)" offset="1"></stop>
                                                </linearGradient>
                                                <linearGradient id="SvgjsLinearGradient1828" x1="1" y1="0" x2="0"
                                                    y2="1">
                                                    <stop id="SvgjsStop1829" stop-opacity="1"
                                                        stop-color="rgba(105,108,255,1)" offset="0.3"></stop>
                                                    <stop id="SvgjsStop1830" stop-opacity="0.6"
                                                        stop-color="rgba(105,108,255,0.6)" offset="0.7"></stop>
                                                    <stop id="SvgjsStop1831" stop-opacity="0.6"
                                                        stop-color="rgba(105,108,255,0.6)" offset="1"></stop>
                                                </linearGradient>
                                            </defs>
                                            <g id="SvgjsG1813" class="apexcharts-radialbar">
                                                <g id="SvgjsG1814">
                                                    <g id="SvgjsG1815" class="apexcharts-tracks">
                                                        <g id="SvgjsG1816"
                                                            class="apexcharts-radialbar-track apexcharts-track" rel="1">
                                                            <path id="apexcharts-radialbarTrack-0"
                                                                d="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 142.16493902439026 167.17541022773656"
                                                                fill="none" fill-opacity="1"
                                                                stroke="rgba(255,255,255,0.85)" stroke-opacity="1"
                                                                stroke-linecap="butt" stroke-width="17.357317073170734"
                                                                stroke-dasharray="0" class="apexcharts-radialbar-area"
                                                                data:pathOrig="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 142.16493902439026 167.17541022773656">
                                                            </path>
                                                        </g>
                                                    </g>
                                                    <g id="SvgjsG1822">
                                                        <g id="SvgjsG1827"
                                                            class="apexcharts-series apexcharts-radial-series"
                                                            seriesName="Growth" rel="1" data:realIndex="0">
                                                            <path id="SvgjsPath1832"
                                                                d="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 175.95555982735613 100.85758285229481"
                                                                fill="none" fill-opacity="0.85"
                                                                stroke="url(#SvgjsLinearGradient1828)"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="17.357317073170734" stroke-dasharray="5"
                                                                class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                                data:angle="234" data:value="78" index="0" j="0"
                                                                data:pathOrig="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 175.95555982735613 100.85758285229481">
                                                            </path>
                                                        </g>
                                                        <circle id="SvgjsCircle1823" r="54.65121951219512" cx="108"
                                                            cy="108" class="apexcharts-radialbar-hollow"
                                                            fill="transparent"></circle>
                                                        <g id="SvgjsG1824" class="apexcharts-datalabels-group"
                                                            transform="translate(0, 0) scale(1)" style="opacity: 1;">
                                                            <text id="SvgjsText1825" font-family="Public Sans" x="108"
                                                                y="123" text-anchor="middle" dominant-baseline="auto"
                                                                font-size="15px" font-weight="500" fill="#566a7f"
                                                                class="apexcharts-text apexcharts-datalabel-label"
                                                                style="font-family: &quot;Public Sans&quot;;">Growth</text><text
                                                                id="SvgjsText1826" font-family="Public Sans" x="108"
                                                                y="99" text-anchor="middle" dominant-baseline="auto"
                                                                font-size="22px" font-weight="500" fill="#566a7f"
                                                                class="apexcharts-text apexcharts-datalabel-value"
                                                                style="font-family: &quot;Public Sans&quot;;">78%</text>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                            <line id="SvgjsLine1833" x1="0" y1="0" x2="216" y2="0" stroke="#b6b6b6"
                                                stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine1834" x1="0" y1="0" x2="216" y2="0" stroke-dasharray="0"
                                                stroke-width="0" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                        </g>
                                        <g id="SvgjsG1810" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend"></div>
                                </div>
                            </div>
                            <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>

                            <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                                <div class="d-flex">
                                    <div class="me-2">
                                        <span class="badge bg-label-primary p-2"><i
                                                class="bx bx-dollar text-primary"></i></span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <small>2022</small>
                                        <h6 class="mb-0">$32.5k</h6>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <span class="badge bg-label-info p-2"><i
                                                class="bx bx-wallet text-info"></i></span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <small>2021</small>
                                        <h6 class="mb-0">$41.2k</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 509px; height: 364px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Total Revenue -->
            <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                <div class="row">
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template-free/demo/assets/img/icons/unicons/paypal.png"
                                            alt="Credit Card" class="rounded">
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="d-block mb-1">Tickets</span>
                                <h3 class="card-title text-nowrap mb-2"><?=$Tickets['num']?></h3>
                                <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i>
                                    -14.82%</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template-free/demo/assets/img/icons/unicons/cc-primary.png"
                                            alt="Credit Card" class="rounded">
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Users</span>
                                <h3 class="card-title mb-2"><?=$Users['num']?></h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                    +28.14%</small>
                            </div>
                        </div>
                    </div>
                    <!-- </div>
<div class="row"> -->
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3"
                                    style="position: relative;">
                                    <div
                                        class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                        <div class="card-title">
                                            <h5 class="text-nowrap mb-2">Profit Report</h5>
                                        </div>
                                        <div class="mt-sm-auto">
                                            <small class="text-success text-nowrap fw-semibold"><i
                                                    class="bx bx-chevron-up"></i> 68.2%</small>
                                            <h3 class="mb-0">$<?=$total?></h3>
                                        </div>
                                    </div>
                                    <div id="profileReportChart" style="min-height: 80px;">
                                        <div id="apexcharts6r8tka3"
                                            class="apexcharts-canvas apexcharts6r8tka3 apexcharts-theme-light"
                                            style="width: 460px; height: 80px;"><svg id="SvgjsSvg1836" width="460"
                                                height="80" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                style="background: transparent;">
                                                <g id="SvgjsG1838" class="apexcharts-inner apexcharts-graphical"
                                                    transform="translate(0, 0)">
                                                    <defs id="SvgjsDefs1837">
                                                        <clipPath id="gridRectMask6r8tka3">
                                                            <rect id="SvgjsRect1843" width="461" height="85" x="-4.5"
                                                                y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0"
                                                                stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                        <clipPath id="forecastMask6r8tka3"></clipPath>
                                                        <clipPath id="nonForecastMask6r8tka3"></clipPath>
                                                        <clipPath id="gridRectMarkerMask6r8tka3">
                                                            <rect id="SvgjsRect1844" width="456" height="84" x="-2"
                                                                y="-2" rx="0" ry="0" opacity="1" stroke-width="0"
                                                                stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                        </clipPath>
                                                        <filter id="SvgjsFilter1850" filterUnits="userSpaceOnUse"
                                                            width="200%" height="200%" x="-50%" y="-50%">
                                                            <feFlood id="SvgjsFeFlood1851" flood-color="#ffab00"
                                                                flood-opacity="0.15" result="SvgjsFeFlood1851Out"
                                                                in="SourceGraphic"></feFlood>
                                                            <feComposite id="SvgjsFeComposite1852"
                                                                in="SvgjsFeFlood1851Out" in2="SourceAlpha" operator="in"
                                                                result="SvgjsFeComposite1852Out"></feComposite>
                                                            <feOffset id="SvgjsFeOffset1853" dx="5" dy="10"
                                                                result="SvgjsFeOffset1853Out"
                                                                in="SvgjsFeComposite1852Out"></feOffset>
                                                            <feGaussianBlur id="SvgjsFeGaussianBlur1854"
                                                                stdDeviation="3 " result="SvgjsFeGaussianBlur1854Out"
                                                                in="SvgjsFeOffset1853Out"></feGaussianBlur>
                                                            <feMerge id="SvgjsFeMerge1855" result="SvgjsFeMerge1855Out"
                                                                in="SourceGraphic">
                                                                <feMergeNode id="SvgjsFeMergeNode1856"
                                                                    in="SvgjsFeGaussianBlur1854Out"></feMergeNode>
                                                                <feMergeNode id="SvgjsFeMergeNode1857"
                                                                    in="[object Arguments]"></feMergeNode>
                                                            </feMerge>
                                                            <feBlend id="SvgjsFeBlend1858" in="SourceGraphic"
                                                                in2="SvgjsFeMerge1855Out" mode="normal"
                                                                result="SvgjsFeBlend1858Out"></feBlend>
                                                        </filter>
                                                    </defs>
                                                    <line id="SvgjsLine1842" x1="0" y1="0" x2="0" y2="80"
                                                        stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt"
                                                        class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="80"
                                                        fill="#b1b9c4" filter="none" fill-opacity="0.9"
                                                        stroke-width="1"></line>
                                                    <g id="SvgjsG1859" class="apexcharts-xaxis"
                                                        transform="translate(0, 0)">
                                                        <g id="SvgjsG1860" class="apexcharts-xaxis-texts-g"
                                                            transform="translate(0, -4)"></g>
                                                    </g>
                                                    <g id="SvgjsG1868" class="apexcharts-grid">
                                                        <g id="SvgjsG1869" class="apexcharts-gridlines-horizontal"
                                                            style="display: none;">
                                                            <line id="SvgjsLine1871" x1="0" y1="0" x2="452" y2="0"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                            </line>
                                                            <line id="SvgjsLine1872" x1="0" y1="20" x2="452" y2="20"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                            </line>
                                                            <line id="SvgjsLine1873" x1="0" y1="40" x2="452" y2="40"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                            </line>
                                                            <line id="SvgjsLine1874" x1="0" y1="60" x2="452" y2="60"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                            </line>
                                                            <line id="SvgjsLine1875" x1="0" y1="80" x2="452" y2="80"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                            </line>
                                                        </g>
                                                        <g id="SvgjsG1870" class="apexcharts-gridlines-vertical"
                                                            style="display: none;"></g>
                                                        <line id="SvgjsLine1877" x1="0" y1="80" x2="452" y2="80"
                                                            stroke="transparent" stroke-dasharray="0"
                                                            stroke-linecap="butt"></line>
                                                        <line id="SvgjsLine1876" x1="0" y1="1" x2="0" y2="80"
                                                            stroke="transparent" stroke-dasharray="0"
                                                            stroke-linecap="butt"></line>
                                                    </g>
                                                    <g id="SvgjsG1845"
                                                        class="apexcharts-line-series apexcharts-plot-series">
                                                        <g id="SvgjsG1846" class="apexcharts-series"
                                                            seriesName="seriesx1" data:longestSeries="true" rel="1"
                                                            data:realIndex="0">
                                                            <path id="SvgjsPath1849"
                                                                d="M 0 76C 31.64 76 58.760000000000005 12 90.4 12C 122.04 12 149.16000000000003 62 180.8 62C 212.44 62 239.56 22 271.2 22C 302.84 22 329.96000000000004 38 361.6 38C 393.24 38 420.36 6 452 6"
                                                                fill="none" fill-opacity="1"
                                                                stroke="rgba(255,171,0,0.85)" stroke-opacity="1"
                                                                stroke-linecap="butt" stroke-width="5"
                                                                stroke-dasharray="0" class="apexcharts-line" index="0"
                                                                clip-path="url(#gridRectMask6r8tka3)"
                                                                filter="url(#SvgjsFilter1850)"
                                                                pathTo="M 0 76C 31.64 76 58.760000000000005 12 90.4 12C 122.04 12 149.16000000000003 62 180.8 62C 212.44 62 239.56 22 271.2 22C 302.84 22 329.96000000000004 38 361.6 38C 393.24 38 420.36 6 452 6"
                                                                pathFrom="M -1 120L -1 120L 90.4 120L 180.8 120L 271.2 120L 361.6 120L 452 120">
                                                            </path>
                                                            <g id="SvgjsG1847" class="apexcharts-series-markers-wrap"
                                                                data:realIndex="0">
                                                                <g class="apexcharts-series-markers">
                                                                    <circle id="SvgjsCircle1883" r="0" cx="0" cy="0"
                                                                        class="apexcharts-marker wlyo5u4fi no-pointer-events"
                                                                        stroke="#ffffff" fill="#ffab00" fill-opacity="1"
                                                                        stroke-width="2" stroke-opacity="0.9"
                                                                        default-marker-size="0"></circle>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="SvgjsG1848" class="apexcharts-datalabels"
                                                            data:realIndex="0"></g>
                                                    </g>
                                                    <line id="SvgjsLine1878" x1="0" y1="0" x2="452" y2="0"
                                                        stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                        stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                    <line id="SvgjsLine1879" x1="0" y1="0" x2="452" y2="0"
                                                        stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                                        class="apexcharts-ycrosshairs-hidden"></line>
                                                    <g id="SvgjsG1880" class="apexcharts-yaxis-annotations"></g>
                                                    <g id="SvgjsG1881" class="apexcharts-xaxis-annotations"></g>
                                                    <g id="SvgjsG1882" class="apexcharts-point-annotations"></g>
                                                </g>
                                                <rect id="SvgjsRect1841" width="0" height="0" x="0" y="0" rx="0" ry="0"
                                                    opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                    fill="#fefefe"></rect>
                                                <g id="SvgjsG1867" class="apexcharts-yaxis" rel="0"
                                                    transform="translate(-18, 0)"></g>
                                                <g id="SvgjsG1839" class="apexcharts-annotations"></g>
                                            </svg>
                                            <div class="apexcharts-legend" style="max-height: 40px;"></div>
                                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                                <div class="apexcharts-tooltip-title"
                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                </div>
                                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                        class="apexcharts-tooltip-marker"
                                                        style="background-color: rgb(255, 171, 0);"></span>
                                                    <div class="apexcharts-tooltip-text"
                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        <div class="apexcharts-tooltip-y-group"><span
                                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                                        <div class="apexcharts-tooltip-goals-group"><span
                                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                                class="apexcharts-tooltip-text-goals-value"></span>
                                                        </div>
                                                        <div class="apexcharts-tooltip-z-group"><span
                                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                <div class="apexcharts-yaxistooltip-text"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="resize-triggers">
                                        <div class="expand-trigger">
                                            <div style="width: 461px; height: 162px;"></div>
                                        </div>
                                        <div class="contract-trigger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Order Statistics -->
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Order Statistics</h5>
                            <small class="text-muted">42.82k Total Sales</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3" style="position: relative;">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <h2 class="mb-2">8,258</h2>
                                <span>Total Orders</span>
                            </div>
                            <div id="orderStatisticsChart" style="min-height: 137.55px;">
                                <div id="apexchartsomyx3d69"
                                    class="apexcharts-canvas apexchartsomyx3d69 apexcharts-theme-light"
                                    style="width: 130px; height: 137.55px;"><svg id="SvgjsSvg1884" width="130"
                                        height="137.55" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                        class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                        style="background: transparent;">
                                        <g id="SvgjsG1886" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(-7, 0)">
                                            <defs id="SvgjsDefs1885">
                                                <clipPath id="gridRectMaskomyx3d69">
                                                    <rect id="SvgjsRect1888" width="150" height="173" x="-4.5" y="-2.5"
                                                        rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMaskomyx3d69"></clipPath>
                                                <clipPath id="nonForecastMaskomyx3d69"></clipPath>
                                                <clipPath id="gridRectMarkerMaskomyx3d69">
                                                    <rect id="SvgjsRect1889" width="145" height="172" x="-2" y="-2"
                                                        rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                            </defs>
                                            <g id="SvgjsG1890" class="apexcharts-pie">
                                                <g id="SvgjsG1891" transform="translate(0, 0) scale(1)">
                                                    <circle id="SvgjsCircle1892" r="44.835365853658544" cx="70.5"
                                                        cy="70.5" fill="transparent"></circle>
                                                    <g id="SvgjsG1893" class="apexcharts-slices">
                                                        <g id="SvgjsG1894"
                                                            class="apexcharts-series apexcharts-pie-series"
                                                            seriesName="Electronic" rel="1" data:realIndex="0">
                                                            <path id="SvgjsPath1895"
                                                                d="M 70.5 10.71951219512195 A 59.78048780487805 59.78048780487805 0 0 1 97.63977353321047 123.7648046533095 L 90.85483014990785 110.44860348998213 A 44.835365853658544 44.835365853658544 0 0 0 70.5 25.664634146341456 L 70.5 10.71951219512195 z"
                                                                fill="rgba(105,108,255,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="5" stroke-dasharray="0"
                                                                class="apexcharts-pie-area apexcharts-donut-slice-0"
                                                                index="0" j="0" data:angle="153" data:startAngle="0"
                                                                data:strokeWidth="5" data:value="85"
                                                                data:pathOrig="M 70.5 10.71951219512195 A 59.78048780487805 59.78048780487805 0 0 1 97.63977353321047 123.7648046533095 L 90.85483014990785 110.44860348998213 A 44.835365853658544 44.835365853658544 0 0 0 70.5 25.664634146341456 L 70.5 10.71951219512195 z"
                                                                stroke="#ffffff"></path>
                                                        </g>
                                                        <g id="SvgjsG1896"
                                                            class="apexcharts-series apexcharts-pie-series"
                                                            seriesName="Sports" rel="2" data:realIndex="1">
                                                            <path id="SvgjsPath1897"
                                                                d="M 97.63977353321047 123.7648046533095 A 59.78048780487805 59.78048780487805 0 0 1 70.5 130.28048780487805 L 70.5 115.33536585365854 A 44.835365853658544 44.835365853658544 0 0 0 90.85483014990785 110.44860348998213 L 97.63977353321047 123.7648046533095 z"
                                                                fill="rgba(133,146,163,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="5" stroke-dasharray="0"
                                                                class="apexcharts-pie-area apexcharts-donut-slice-1"
                                                                index="0" j="1" data:angle="27" data:startAngle="153"
                                                                data:strokeWidth="5" data:value="15"
                                                                data:pathOrig="M 97.63977353321047 123.7648046533095 A 59.78048780487805 59.78048780487805 0 0 1 70.5 130.28048780487805 L 70.5 115.33536585365854 A 44.835365853658544 44.835365853658544 0 0 0 90.85483014990785 110.44860348998213 L 97.63977353321047 123.7648046533095 z"
                                                                stroke="#ffffff"></path>
                                                        </g>
                                                        <g id="SvgjsG1898"
                                                            class="apexcharts-series apexcharts-pie-series"
                                                            seriesName="Decor" rel="3" data:realIndex="2">
                                                            <path id="SvgjsPath1899"
                                                                d="M 70.5 130.28048780487805 A 59.78048780487805 59.78048780487805 0 0 1 10.71951219512195 70.50000000000001 L 25.664634146341456 70.5 A 44.835365853658544 44.835365853658544 0 0 0 70.5 115.33536585365854 L 70.5 130.28048780487805 z"
                                                                fill="rgba(3,195,236,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="5" stroke-dasharray="0"
                                                                class="apexcharts-pie-area apexcharts-donut-slice-2"
                                                                index="0" j="2" data:angle="90" data:startAngle="180"
                                                                data:strokeWidth="5" data:value="50"
                                                                data:pathOrig="M 70.5 130.28048780487805 A 59.78048780487805 59.78048780487805 0 0 1 10.71951219512195 70.50000000000001 L 25.664634146341456 70.5 A 44.835365853658544 44.835365853658544 0 0 0 70.5 115.33536585365854 L 70.5 130.28048780487805 z"
                                                                stroke="#ffffff"></path>
                                                        </g>
                                                        <g id="SvgjsG1900"
                                                            class="apexcharts-series apexcharts-pie-series"
                                                            seriesName="Fashion" rel="4" data:realIndex="3">
                                                            <path id="SvgjsPath1901"
                                                                d="M 10.71951219512195 70.50000000000001 A 59.78048780487805 59.78048780487805 0 0 1 70.48956633664653 10.719513105630845 L 70.4921747524849 25.664634829223125 A 44.835365853658544 44.835365853658544 0 0 0 25.664634146341456 70.5 L 10.71951219512195 70.50000000000001 z"
                                                                fill="rgba(113,221,55,1)" fill-opacity="1"
                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                stroke-width="5" stroke-dasharray="0"
                                                                class="apexcharts-pie-area apexcharts-donut-slice-3"
                                                                index="0" j="3" data:angle="90" data:startAngle="270"
                                                                data:strokeWidth="5" data:value="50"
                                                                data:pathOrig="M 10.71951219512195 70.50000000000001 A 59.78048780487805 59.78048780487805 0 0 1 70.48956633664653 10.719513105630845 L 70.4921747524849 25.664634829223125 A 44.835365853658544 44.835365853658544 0 0 0 25.664634146341456 70.5 L 10.71951219512195 70.50000000000001 z"
                                                                stroke="#ffffff"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1902" class="apexcharts-datalabels-group"
                                                    transform="translate(0, 0) scale(1)"><text id="SvgjsText1903"
                                                        font-family="Helvetica, Arial, sans-serif" x="70.5" y="90.5"
                                                        text-anchor="middle" dominant-baseline="auto"
                                                        font-size="0.8125rem" font-weight="400" fill="#a1acb8"
                                                        class="apexcharts-text apexcharts-datalabel-label"
                                                        style="font-family: Helvetica, Arial, sans-serif;">Weekly</text><text
                                                        id="SvgjsText1904" font-family="Public Sans" x="70.5" y="71.5"
                                                        text-anchor="middle" dominant-baseline="auto" font-size="1.5rem"
                                                        font-weight="400" fill="#566a7f"
                                                        class="apexcharts-text apexcharts-datalabel-value"
                                                        style="font-family: &quot;Public Sans&quot;;">38%</text></g>
                                            </g>
                                            <line id="SvgjsLine1905" x1="0" y1="0" x2="141" y2="0" stroke="#b6b6b6"
                                                stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine1906" x1="0" y1="0" x2="141" y2="0" stroke-dasharray="0"
                                                stroke-width="0" stroke-linecap="butt"
                                                class="apexcharts-ycrosshairs-hidden"></line>
                                        </g>
                                        <g id="SvgjsG1887" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend"></div>
                                    <div class="apexcharts-tooltip apexcharts-theme-dark">
                                        <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(105, 108, 255);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(133, 146, 163);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 3;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(3, 195, 236);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 4;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(113, 221, 55);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 461px; height: 139px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class="bx bx-mobile-alt"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Electronic</h6>
                                        <small class="text-muted">Mobile, Earbuds, TV</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">82.5k</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-success"><i
                                            class="bx bx-closet"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Fashion</h6>
                                        <small class="text-muted">T-shirt, Jeans, Shoes</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">23.8k</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-info"><i
                                            class="bx bx-home-alt"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Decor</h6>
                                        <small class="text-muted">Fine Art, Dining</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">849k</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-secondary"><i
                                            class="bx bx-football"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Sports</h6>
                                        <small class="text-muted">Football, Cricket Kit</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">99</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Order Statistics -->

            <!-- Expense Overview -->
            <div class="col-md-6 col-lg-4 order-1 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-tabs-line-card-income"
                                    aria-controls="navs-tabs-line-card-income" aria-selected="true">Income</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab">Expenses</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab">Profit</button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body px-0">
                        <div class="tab-content p-0">
                            <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel"
                                style="position: relative;">
                                <div class="d-flex p-4 pt-3">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template-free/demo/assets/img/icons/unicons/wallet.png"
                                            alt="User">
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Total Balance</small>
                                        <div class="d-flex align-items-center">
                                            <h6 class="mb-0 me-1">$459.10</h6>
                                            <small class="text-success fw-semibold">
                                                <i class="bx bx-chevron-up"></i>
                                                42.9%
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div id="incomeChart" style="min-height: 215px;">
                                    <div id="apexchartsy3s7nwfv"
                                        class="apexcharts-canvas apexchartsy3s7nwfv apexcharts-theme-light"
                                        style="width: 508px; height: 215px;"><svg id="SvgjsSvg1907" width="508"
                                            height="215" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                            class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS"
                                            transform="translate(0, 0)" style="background: transparent;">
                                            <g id="SvgjsG1909" class="apexcharts-inner apexcharts-graphical"
                                                transform="translate(0, 10)">
                                                <defs id="SvgjsDefs1908">
                                                    <clipPath id="gridRectMasky3s7nwfv">
                                                        <rect id="SvgjsRect1914" width="496.6875"
                                                            height="176.70079907417298" x="-3" y="-1" rx="0" ry="0"
                                                            opacity="1" stroke-width="0" stroke="none"
                                                            stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="forecastMasky3s7nwfv"></clipPath>
                                                    <clipPath id="nonForecastMasky3s7nwfv"></clipPath>
                                                    <clipPath id="gridRectMarkerMasky3s7nwfv">
                                                        <rect id="SvgjsRect1915" width="518.6875"
                                                            height="202.70079907417298" x="-14" y="-14" rx="0" ry="0"
                                                            opacity="1" stroke-width="0" stroke="none"
                                                            stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <linearGradient id="SvgjsLinearGradient1935" x1="0" y1="0" x2="0"
                                                        y2="1">
                                                        <stop id="SvgjsStop1936" stop-opacity="0.5"
                                                            stop-color="rgba(105,108,255,0.5)" offset="0"></stop>
                                                        <stop id="SvgjsStop1937" stop-opacity="0.25"
                                                            stop-color="rgba(195,196,255,0.25)" offset="0.95"></stop>
                                                        <stop id="SvgjsStop1938" stop-opacity="0.25"
                                                            stop-color="rgba(195,196,255,0.25)" offset="1"></stop>
                                                    </linearGradient>
                                                </defs>
                                                <line id="SvgjsLine1913" x1="0" y1="0" x2="0" y2="174.70079907417298"
                                                    stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt"
                                                    class="apexcharts-xcrosshairs" x="0" y="0" width="1"
                                                    height="174.70079907417298" fill="#b1b9c4" filter="none"
                                                    fill-opacity="0.9" stroke-width="1"></line>
                                                <g id="SvgjsG1941" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                    <g id="SvgjsG1942" class="apexcharts-xaxis-texts-g"
                                                        transform="translate(0, -4)"><text id="SvgjsText1944"
                                                            font-family="Helvetica, Arial, sans-serif" x="0"
                                                            y="203.70079907417298" text-anchor="middle"
                                                            dominant-baseline="auto" font-size="13px" font-weight="400"
                                                            fill="#a1acb8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1945"></tspan>
                                                            <title></title>
                                                        </text><text id="SvgjsText1947"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="70.0982142857143" y="203.70079907417298"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="13px" font-weight="400" fill="#a1acb8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1948">Jan</tspan>
                                                            <title>Jan</title>
                                                        </text><text id="SvgjsText1950"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="140.19642857142858" y="203.70079907417298"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="13px" font-weight="400" fill="#a1acb8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1951">Feb</tspan>
                                                            <title>Feb</title>
                                                        </text><text id="SvgjsText1953"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="210.29464285714286" y="203.70079907417298"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="13px" font-weight="400" fill="#a1acb8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1954">Mar</tspan>
                                                            <title>Mar</title>
                                                        </text><text id="SvgjsText1956"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="280.3928571428571" y="203.70079907417298"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="13px" font-weight="400" fill="#a1acb8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1957">Apr</tspan>
                                                            <title>Apr</title>
                                                        </text><text id="SvgjsText1959"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="350.4910714285714" y="203.70079907417298"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="13px" font-weight="400" fill="#a1acb8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1960">May</tspan>
                                                            <title>May</title>
                                                        </text><text id="SvgjsText1962"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="420.58928571428567" y="203.70079907417298"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="13px" font-weight="400" fill="#a1acb8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1963">Jun</tspan>
                                                            <title>Jun</title>
                                                        </text><text id="SvgjsText1965"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="490.68749999999994" y="203.70079907417298"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="13px" font-weight="400" fill="#a1acb8"
                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                            <tspan id="SvgjsTspan1966">Jul</tspan>
                                                            <title>Jul</title>
                                                        </text></g>
                                                </g>
                                                <g id="SvgjsG1969" class="apexcharts-grid">
                                                    <g id="SvgjsG1970" class="apexcharts-gridlines-horizontal">
                                                        <line id="SvgjsLine1972" x1="0" y1="0" x2="490.6875" y2="0"
                                                            stroke="#eceef1" stroke-dasharray="3" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1973" x1="0" y1="43.675199768543244"
                                                            x2="490.6875" y2="43.675199768543244" stroke="#eceef1"
                                                            stroke-dasharray="3" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1974" x1="0" y1="87.35039953708649"
                                                            x2="490.6875" y2="87.35039953708649" stroke="#eceef1"
                                                            stroke-dasharray="3" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1975" x1="0" y1="131.02559930562973"
                                                            x2="490.6875" y2="131.02559930562973" stroke="#eceef1"
                                                            stroke-dasharray="3" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1976" x1="0" y1="174.70079907417298"
                                                            x2="490.6875" y2="174.70079907417298" stroke="#eceef1"
                                                            stroke-dasharray="3" stroke-linecap="butt"
                                                            class="apexcharts-gridline"></line>
                                                    </g>
                                                    <g id="SvgjsG1971" class="apexcharts-gridlines-vertical"></g>
                                                    <line id="SvgjsLine1978" x1="0" y1="174.70079907417298"
                                                        x2="490.6875" y2="174.70079907417298" stroke="transparent"
                                                        stroke-dasharray="0" stroke-linecap="butt"></line>
                                                    <line id="SvgjsLine1977" x1="0" y1="1" x2="0"
                                                        y2="174.70079907417298" stroke="transparent"
                                                        stroke-dasharray="0" stroke-linecap="butt"></line>
                                                </g>
                                                <g id="SvgjsG1916"
                                                    class="apexcharts-area-series apexcharts-plot-series">
                                                    <g id="SvgjsG1917" class="apexcharts-series" seriesName="seriesx1"
                                                        data:longestSeries="true" rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath1939"
                                                            d="M 0 174.70079907417298L 0 113.55551939821244C 24.534375 113.55551939821244 45.563839285714295 126.65807932877541 70.09821428571429 126.65807932877541C 94.63258928571429 126.65807932877541 115.66205357142859 87.3503995370865 140.19642857142858 87.3503995370865C 164.73080357142857 87.3503995370865 185.76026785714288 122.29055935192109 210.29464285714286 122.29055935192109C 234.82901785714287 122.29055935192109 255.85848214285716 34.9401598148346 280.39285714285717 34.9401598148346C 304.9272321428572 34.9401598148346 325.95669642857143 104.82047944450379 350.49107142857144 104.82047944450379C 375.02544642857146 104.82047944450379 396.0549107142857 65.51279965281486 420.5892857142857 65.51279965281486C 445.12366071428573 65.51279965281486 466.153125 91.71791951394081 490.6875 91.71791951394081C 490.6875 91.71791951394081 490.6875 91.71791951394081 490.6875 174.70079907417298M 490.6875 91.71791951394081z"
                                                            fill="url(#SvgjsLinearGradient1935)" fill-opacity="1"
                                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                            stroke-dasharray="0" class="apexcharts-area" index="0"
                                                            clip-path="url(#gridRectMasky3s7nwfv)"
                                                            pathTo="M 0 174.70079907417298L 0 113.55551939821244C 24.534375 113.55551939821244 45.563839285714295 126.65807932877541 70.09821428571429 126.65807932877541C 94.63258928571429 126.65807932877541 115.66205357142859 87.3503995370865 140.19642857142858 87.3503995370865C 164.73080357142857 87.3503995370865 185.76026785714288 122.29055935192109 210.29464285714286 122.29055935192109C 234.82901785714287 122.29055935192109 255.85848214285716 34.9401598148346 280.39285714285717 34.9401598148346C 304.9272321428572 34.9401598148346 325.95669642857143 104.82047944450379 350.49107142857144 104.82047944450379C 375.02544642857146 104.82047944450379 396.0549107142857 65.51279965281486 420.5892857142857 65.51279965281486C 445.12366071428573 65.51279965281486 466.153125 91.71791951394081 490.6875 91.71791951394081C 490.6875 91.71791951394081 490.6875 91.71791951394081 490.6875 174.70079907417298M 490.6875 91.71791951394081z"
                                                            pathFrom="M -1 218.37599884271623L -1 218.37599884271623L 70.09821428571429 218.37599884271623L 140.19642857142858 218.37599884271623L 210.29464285714286 218.37599884271623L 280.39285714285717 218.37599884271623L 350.49107142857144 218.37599884271623L 420.5892857142857 218.37599884271623L 490.6875 218.37599884271623">
                                                        </path>
                                                        <path id="SvgjsPath1940"
                                                            d="M 0 113.55551939821244C 24.534375 113.55551939821244 45.563839285714295 126.65807932877541 70.09821428571429 126.65807932877541C 94.63258928571429 126.65807932877541 115.66205357142859 87.3503995370865 140.19642857142858 87.3503995370865C 164.73080357142857 87.3503995370865 185.76026785714288 122.29055935192109 210.29464285714286 122.29055935192109C 234.82901785714287 122.29055935192109 255.85848214285716 34.9401598148346 280.39285714285717 34.9401598148346C 304.9272321428572 34.9401598148346 325.95669642857143 104.82047944450379 350.49107142857144 104.82047944450379C 375.02544642857146 104.82047944450379 396.0549107142857 65.51279965281486 420.5892857142857 65.51279965281486C 445.12366071428573 65.51279965281486 466.153125 91.71791951394081 490.6875 91.71791951394081"
                                                            fill="none" fill-opacity="1" stroke="#696cff"
                                                            stroke-opacity="1" stroke-linecap="butt" stroke-width="2"
                                                            stroke-dasharray="0" class="apexcharts-area" index="0"
                                                            clip-path="url(#gridRectMasky3s7nwfv)"
                                                            pathTo="M 0 113.55551939821244C 24.534375 113.55551939821244 45.563839285714295 126.65807932877541 70.09821428571429 126.65807932877541C 94.63258928571429 126.65807932877541 115.66205357142859 87.3503995370865 140.19642857142858 87.3503995370865C 164.73080357142857 87.3503995370865 185.76026785714288 122.29055935192109 210.29464285714286 122.29055935192109C 234.82901785714287 122.29055935192109 255.85848214285716 34.9401598148346 280.39285714285717 34.9401598148346C 304.9272321428572 34.9401598148346 325.95669642857143 104.82047944450379 350.49107142857144 104.82047944450379C 375.02544642857146 104.82047944450379 396.0549107142857 65.51279965281486 420.5892857142857 65.51279965281486C 445.12366071428573 65.51279965281486 466.153125 91.71791951394081 490.6875 91.71791951394081"
                                                            pathFrom="M -1 218.37599884271623L -1 218.37599884271623L 70.09821428571429 218.37599884271623L 140.19642857142858 218.37599884271623L 210.29464285714286 218.37599884271623L 280.39285714285717 218.37599884271623L 350.49107142857144 218.37599884271623L 420.5892857142857 218.37599884271623L 490.6875 218.37599884271623">
                                                        </path>
                                                        <g id="SvgjsG1918" class="apexcharts-series-markers-wrap"
                                                            data:realIndex="0">
                                                            <g id="SvgjsG1920" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMasky3s7nwfv)">
                                                                <circle id="SvgjsCircle1921" r="6" cx="0"
                                                                    cy="113.55551939821244"
                                                                    class="apexcharts-marker no-pointer-events w62tn60e8"
                                                                    stroke="transparent" fill="transparent"
                                                                    fill-opacity="1" stroke-width="4"
                                                                    stroke-opacity="0.9" rel="0" j="0" index="0"
                                                                    default-marker-size="6"></circle>
                                                                <circle id="SvgjsCircle1922" r="6"
                                                                    cx="70.09821428571429" cy="126.65807932877541"
                                                                    class="apexcharts-marker no-pointer-events w2x1ifb4r"
                                                                    stroke="transparent" fill="transparent"
                                                                    fill-opacity="1" stroke-width="4"
                                                                    stroke-opacity="0.9" rel="1" j="1" index="0"
                                                                    default-marker-size="6"></circle>
                                                            </g>
                                                            <g id="SvgjsG1923" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMasky3s7nwfv)">
                                                                <circle id="SvgjsCircle1924" r="6"
                                                                    cx="140.19642857142858" cy="87.3503995370865"
                                                                    class="apexcharts-marker no-pointer-events wd7exgacu"
                                                                    stroke="transparent" fill="transparent"
                                                                    fill-opacity="1" stroke-width="4"
                                                                    stroke-opacity="0.9" rel="2" j="2" index="0"
                                                                    default-marker-size="6"></circle>
                                                            </g>
                                                            <g id="SvgjsG1925" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMasky3s7nwfv)">
                                                                <circle id="SvgjsCircle1926" r="6"
                                                                    cx="210.29464285714286" cy="122.29055935192109"
                                                                    class="apexcharts-marker no-pointer-events w03pk6rlij"
                                                                    stroke="transparent" fill="transparent"
                                                                    fill-opacity="1" stroke-width="4"
                                                                    stroke-opacity="0.9" rel="3" j="3" index="0"
                                                                    default-marker-size="6"></circle>
                                                            </g>
                                                            <g id="SvgjsG1927" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMasky3s7nwfv)">
                                                                <circle id="SvgjsCircle1928" r="6"
                                                                    cx="280.39285714285717" cy="34.9401598148346"
                                                                    class="apexcharts-marker no-pointer-events wsmsqrmsn"
                                                                    stroke="transparent" fill="transparent"
                                                                    fill-opacity="1" stroke-width="4"
                                                                    stroke-opacity="0.9" rel="4" j="4" index="0"
                                                                    default-marker-size="6"></circle>
                                                            </g>
                                                            <g id="SvgjsG1929" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMasky3s7nwfv)">
                                                                <circle id="SvgjsCircle1930" r="6"
                                                                    cx="350.49107142857144" cy="104.82047944450379"
                                                                    class="apexcharts-marker no-pointer-events wbpsnpufa"
                                                                    stroke="transparent" fill="transparent"
                                                                    fill-opacity="1" stroke-width="4"
                                                                    stroke-opacity="0.9" rel="5" j="5" index="0"
                                                                    default-marker-size="6"></circle>
                                                            </g>
                                                            <g id="SvgjsG1931" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMasky3s7nwfv)">
                                                                <circle id="SvgjsCircle1932" r="6"
                                                                    cx="420.5892857142857" cy="65.51279965281486"
                                                                    class="apexcharts-marker no-pointer-events w7tdm3d9vh"
                                                                    stroke="transparent" fill="transparent"
                                                                    fill-opacity="1" stroke-width="4"
                                                                    stroke-opacity="0.9" rel="6" j="6" index="0"
                                                                    default-marker-size="6"></circle>
                                                            </g>
                                                            <g id="SvgjsG1933" class="apexcharts-series-markers"
                                                                clip-path="url(#gridRectMarkerMasky3s7nwfv)">
                                                                <circle id="SvgjsCircle1934" r="6" cx="490.6875"
                                                                    cy="91.71791951394081"
                                                                    class="apexcharts-marker no-pointer-events wnbw31rzr"
                                                                    stroke="#696cff" fill="#ffffff" fill-opacity="1"
                                                                    stroke-width="4" stroke-opacity="0.9" rel="7" j="7"
                                                                    index="0" default-marker-size="6"></circle>
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <g id="SvgjsG1919" class="apexcharts-datalabels" data:realIndex="0">
                                                    </g>
                                                </g>
                                                <line id="SvgjsLine1979" x1="0" y1="0" x2="490.6875" y2="0"
                                                    stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                    stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine1980" x1="0" y1="0" x2="490.6875" y2="0"
                                                    stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                                <g id="SvgjsG1981" class="apexcharts-yaxis-annotations"></g>
                                                <g id="SvgjsG1982" class="apexcharts-xaxis-annotations"></g>
                                                <g id="SvgjsG1983" class="apexcharts-point-annotations"></g>
                                                <rect id="SvgjsRect1984" width="0" height="0" x="0" y="0" rx="0" ry="0"
                                                    opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                    fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                                                <rect id="SvgjsRect1985" width="0" height="0" x="0" y="0" rx="0" ry="0"
                                                    opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                    fill="#fefefe" class="apexcharts-selection-rect"></rect>
                                            </g>
                                            <rect id="SvgjsRect1912" width="0" height="0" x="0" y="0" rx="0" ry="0"
                                                opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fefefe"></rect>
                                            <g id="SvgjsG1967" class="apexcharts-yaxis" rel="0"
                                                transform="translate(-8, 0)">
                                                <g id="SvgjsG1968" class="apexcharts-yaxis-texts-g"></g>
                                            </g>
                                            <g id="SvgjsG1910" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend" style="max-height: 107.5px;"></div>
                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                            <div class="apexcharts-tooltip-title"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            </div>
                                            <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                    class="apexcharts-tooltip-marker"
                                                    style="background-color: rgb(105, 108, 255);"></span>
                                                <div class="apexcharts-tooltip-text"
                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span
                                                            class="apexcharts-tooltip-text-y-label"></span><span
                                                            class="apexcharts-tooltip-text-y-value"></span></div>
                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                            class="apexcharts-tooltip-text-goals-value"></span></div>
                                                    <div class="apexcharts-tooltip-z-group"><span
                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                            <div class="apexcharts-xaxistooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            </div>
                                        </div>
                                        <div
                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                            <div class="apexcharts-yaxistooltip-text"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center pt-4 gap-2">
                                    <div class="flex-shrink-0" style="position: relative;">
                                        <div id="expensesOfWeek" style="min-height: 57.7px;">
                                            <div id="apexchartsz651wwhr"
                                                class="apexcharts-canvas apexchartsz651wwhr apexcharts-theme-light"
                                                style="width: 60px; height: 57.7px;"><svg id="SvgjsSvg1703" width="60"
                                                    height="57.7" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                    xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                    style="background: transparent;">
                                                    <g id="SvgjsG1705" class="apexcharts-inner apexcharts-graphical"
                                                        transform="translate(-10, -10)">
                                                        <defs id="SvgjsDefs1704">
                                                            <clipPath id="gridRectMaskz651wwhr">
                                                                <rect id="SvgjsRect1707" width="86" height="87" x="-3"
                                                                    y="-1" rx="0" ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0" fill="#fff">
                                                                </rect>
                                                            </clipPath>
                                                            <clipPath id="forecastMaskz651wwhr"></clipPath>
                                                            <clipPath id="nonForecastMaskz651wwhr"></clipPath>
                                                            <clipPath id="gridRectMarkerMaskz651wwhr">
                                                                <rect id="SvgjsRect1708" width="84" height="89" x="-2"
                                                                    y="-2" rx="0" ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0" fill="#fff">
                                                                </rect>
                                                            </clipPath>
                                                        </defs>
                                                        <g id="SvgjsG1709" class="apexcharts-radialbar">
                                                            <g id="SvgjsG1710">
                                                                <g id="SvgjsG1711" class="apexcharts-tracks">
                                                                    <g id="SvgjsG1712"
                                                                        class="apexcharts-radialbar-track apexcharts-track"
                                                                        rel="1">
                                                                        <path id="apexcharts-radialbarTrack-0"
                                                                            d="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 39.99617740968999 18.098171065291247"
                                                                            fill="none" fill-opacity="1"
                                                                            stroke="rgba(236,238,241,0.85)"
                                                                            stroke-opacity="1" stroke-linecap="round"
                                                                            stroke-width="2.0408536585365864"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-radialbar-area"
                                                                            data:pathOrig="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 39.99617740968999 18.098171065291247">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                                <g id="SvgjsG1714">
                                                                    <g id="SvgjsG1718"
                                                                        class="apexcharts-series apexcharts-radial-series"
                                                                        seriesName="seriesx1" rel="1"
                                                                        data:realIndex="0">
                                                                        <path id="SvgjsPath1719"
                                                                            d="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 22.2810479140526 52.873572242130095"
                                                                            fill="none" fill-opacity="0.85"
                                                                            stroke="rgba(105,108,255,0.85)"
                                                                            stroke-opacity="1" stroke-linecap="round"
                                                                            stroke-width="4.081707317073173"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                                            data:angle="234" data:value="65" index="0"
                                                                            j="0"
                                                                            data:pathOrig="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 22.2810479140526 52.873572242130095">
                                                                        </path>
                                                                    </g>
                                                                    <circle id="SvgjsCircle1715" r="18.881402439024395"
                                                                        cx="40" cy="40"
                                                                        class="apexcharts-radialbar-hollow"
                                                                        fill="transparent"></circle>
                                                                    <g id="SvgjsG1716"
                                                                        class="apexcharts-datalabels-group"
                                                                        transform="translate(0, 0) scale(1)"
                                                                        style="opacity: 1;"><text id="SvgjsText1717"
                                                                            font-family="Helvetica, Arial, sans-serif"
                                                                            x="40" y="45" text-anchor="middle"
                                                                            dominant-baseline="auto" font-size="13px"
                                                                            font-weight="400" fill="#697a8d"
                                                                            class="apexcharts-text apexcharts-datalabel-value"
                                                                            style="font-family: Helvetica, Arial, sans-serif;">$65</text>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <line id="SvgjsLine1720" x1="0" y1="0" x2="80" y2="0"
                                                            stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                            stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                        <line id="SvgjsLine1721" x1="0" y1="0" x2="80" y2="0"
                                                            stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                                            class="apexcharts-ycrosshairs-hidden"></line>
                                                    </g>
                                                    <g id="SvgjsG1706" class="apexcharts-annotations"></g>
                                                </svg>
                                                <div class="apexcharts-legend"></div>
                                            </div>
                                        </div>
                                        <div class="resize-triggers">
                                            <div class="expand-trigger">
                                                <div style="width: 61px; height: 59px;"></div>
                                            </div>
                                            <div class="contract-trigger"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-n1 mt-1">Expenses This Week</p>
                                        <small class="text-muted">$39 less than last week</small>
                                    </div>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 509px; height: 377px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Expense Overview -->

            <!-- Transactions -->
            <div class="col-md-6 col-lg-4 order-2 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Transactions</h5>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template-free/demo/assets/img/icons/unicons/paypal.png"
                                        alt="User" class="rounded">
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Paypal</small>
                                        <h6 class="mb-0">Send money</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">+82.6</h6> <span class="text-muted">USD</span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template-free/demo/assets/img/icons/unicons/wallet.png"
                                        alt="User" class="rounded">
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Wallet</small>
                                        <h6 class="mb-0">Mac'D</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">+270.69</h6> <span class="text-muted">USD</span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template-free/demo/assets/img/icons/unicons/chart.png"
                                        alt="User" class="rounded">
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Transfer</small>
                                        <h6 class="mb-0">Refund</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">+637.91</h6> <span class="text-muted">USD</span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template-free/demo/assets/img/icons/unicons/cc-success.png"
                                        alt="User" class="rounded">
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Credit Card</small>
                                        <h6 class="mb-0">Ordered Food</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">-838.71</h6> <span class="text-muted">USD</span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template-free/demo/assets/img/icons/unicons/wallet.png"
                                        alt="User" class="rounded">
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Wallet</small>
                                        <h6 class="mb-0">Starbucks</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">+203.33</h6> <span class="text-muted">USD</span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template-free/demo/assets/img/icons/unicons/cc-warning.png"
                                        alt="User" class="rounded">
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Mastercard</small>
                                        <h6 class="mb-0">Ordered Food</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">-92.45</h6> <span class="text-muted">USD</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Transactions -->
        </div>

        <!-- pricingModal -->
        <!--/ pricingModal -->

    </div>
    <!-- / Content -->

    <!-- Footer -->
    <!-- Footer-->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
                © <script>
                document.write(new Date().getFullYear())
                </script>2023
                , made with ❤️ by <a href="https://themeselection.com" target="_blank"
                    class="footer-link fw-bolder">ThemeSelection</a>
            </div>
            <div>
                <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>
                <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/laravel-introduction.html"
                    target="_blank" class="footer-link me-4">Documentation</a>
                <a href="https://github.com/themeselection/sneat-html-laravel-admin-template-free/issues"
                    target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
            </div>
        </div>
    </footer>
    <!--/ Footer-->
    <!-- / Footer -->
    <div class="content-backdrop fade"></div>
</div>

<div id="chart" style="height: 250px;"></div>



<?php
    require_once('layouts/footer.php')
?>