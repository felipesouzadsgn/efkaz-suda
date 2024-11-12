<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'Minha Aplicação' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="theme-color" content="#712cf9">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
        }
        .bg-suda {
            background: #1A1B51;
            background: -webkit-linear-gradient(-190deg, #2E3092, #1A1B51);
            background: linear-gradient(-190deg, #2E3092, #1A1B51);
        }
        .main-content {
            background: #FFF;
            max-width: 720px;
        }
        body > .container {
            padding-top: 200px;
        }
        .step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f1f1f1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: bold;
            color: #bbb;
        }

        .step.active {
            background-color: #4caf50;
            color: white;
        }

        .step .check {
            color: white;
        }

        .progress-line {
            width: 100%;
            height: 4px;
            background-color: #f1f1f1;
            position: absolute;
            top: 18px;
            z-index: 0;
        }

        .progress-line.active {
            background-color: #4caf50;
        }

        .step-container {
            display: flex;
            justify-content: space-between;
            position: relative;
        }

        .step-box {
            position: relative;
            z-index: 1;
        }
        .bg-light {
            -webkit-box-shadow: 0px 4px 15px 0px rgba(0,0,0,0.08);
            -moz-box-shadow: 0px 4px 15px 0px rgba(0,0,0,0.08);
            box-shadow: 0px 4px 15px 0px rgba(0,0,0,0.08);
            border-radius: 8px !important;
            background-color: #FBFCFF;
            border: 1px solid #E2E8F0;
        }
        .btn-primary {
            background-color: #2E3092;
        }
    </style>

    <?= $this->renderSection('head') ?>

</head>

<body class="text-center">

<div class="row">

    <div class="col-md-4 bg-dark vh-100 d-flex align-items-center justify-content-center bg-suda position-fixed">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span class="fs-4">Sidebar X</span>
        </a>
    </div>
    <div class="offset-md-4 col-md-8 vh-100 d-flex align-items-center justify-content-center pt-5">

        <main class="main-content d-block m-auto">


            <div class="barra">

                <div class="step-container">
                    <div class="step-box">
                        <div class="step active">
                            <i class="check"><svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_2001_3)">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3851 0.996566C13.9392 0.380801 14.8877 0.330883 15.5034 0.885072C16.1192 1.43926 16.1691 2.38769 15.6149 3.00346L6.61494 13.0035C6.04003 13.6422 5.04703 13.6684 4.43934 13.0607L0.43934 9.06067C-0.146447 8.47489 -0.146447 7.52514 0.43934 6.93935C1.02513 6.35357 1.97487 6.35357 2.56066 6.93935L5.44271 9.8214L13.3851 0.996566Z" fill="white"/>
                                </g>
                                <defs>
                                <filter id="filter0_d_2001_3" x="0" y="0.5" width="16" height="13.75" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                <feOffset dy="0.75"/>
                                <feComposite in2="hardAlpha" operator="out"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0"/>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2001_3"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2001_3" result="shape"/>
                                </filter>
                                </defs>
                                </svg>
                            </i>
                        </div>
                    </div>
                    <div class="progress-line active"></div>
                    <div class="step-box">
                        <div class="step">
                            2
                        </div>
                    </div>
                    <div class="progress-line"></div>
                    <div class="step-box">
                        <div class="step">
                            3
                        </div>
                    </div>
                </div>
            </div>

            <?= $this->renderSection('content') ?>

        </main>

    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('js/wizard.js') ?>"></script>

    <?= $this->renderSection('scripts') ?>
    
</body>

</body>

