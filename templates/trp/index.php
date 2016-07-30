<?php defined("_JEXEC") or die();

$doc = JFactory::getDocument();
$doc->addStylesheet(JUri::base(TRUE) . '/templates/' . $doc->template . '/css/styles.css');
$app = JFactory::getApplication();
$options = $app->input->getVar('option');
$templateparams = $app->getTemplate(true)->params;
$this->addStyleDeclaration("
:root{
    --main-background-color: " . $templateparams->get('main_background') . ";
    --header-color: " . $templateparams->get('header_background') . ";
    --theme-color: " . $templateparams->get('theme') . ";
    --line-color:" . $templateparams->get('lines') . ";
    --font-color: " . $templateparams->get('font_color') . ";
    --font-color-with-background: " . $templateparams->get('font_color_with_background') . ";
    --accent-color: " . $templateparams->get('accent') . ";
    --highlight-color: " . $templateparams->get('highlight') . ";
}");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:jdoc="http://www.w3.org/2001/XInclude">

<head>
    <jdoc:include type="head"/>
</head>

<!--[if IE 9 ]> <body class="ie9"> <![endif]-->
<body>
<div class="main-div">
    <div class="header">
        <a class="logo-link" href="<?php echo $this->baseurl; ?>/">
            <svg class="trp-logo-svg" xmlns="http://www.w3.org/2000/svg" width="300" height="80" viewBox="0 0 246.32 50">
                <style type="text/css">
                .brace{fill:#FF0066;}
                .dot-trp{fill:#0070C0;}
                .slogan{fill:#0B0B0B;}
                </style>
                <path class="brace" d="M20.84 38.25l0 0.56c0 1.49-1.21 2.7-2.7 2.7H2.69C1.21 41.51 0 40.31 0 38.82v-15.43c0-1.49 1.21-2.7 2.7-2.7l0.56 0c1.49 0 2.69 1.21 2.69 2.69v12.17H18.15C19.64 35.55 20.85 36.76 20.84 38.25zM13.2 16.14h12.17v12.19c0 1.49 1.21 2.69 2.69 2.69l0.56 0c1.49 0 2.7-1.21 2.7-2.7V12.87c0-1.49-1.21-2.69-2.69-2.69H13.21c-1.49 0-2.7 1.21-2.7 2.7l0 0.56C10.51 14.93 11.71 16.14 13.2 16.14z"/><path class="dot-trp" d="M42.05 18.65h0.63V15.2c0-0.93 0.02-1.65 0.07-2.18 0.05-0.53 0.19-0.98 0.41-1.36 0.22-0.39 0.55-0.71 0.97-0.96 0.42-0.24 0.89-0.37 1.41-0.37 0.73 0 1.39 0.27 1.98 0.82 0.39 0.37 0.64 0.81 0.75 1.34 0.11 0.53 0.16 1.27 0.16 2.24v3.91h2.1c0.81 0 1.43 0.19 1.86 0.58 0.43 0.39 0.64 0.88 0.64 1.48 0 0.77-0.3 1.31-0.91 1.62 -0.61 0.31-1.48 0.46-2.62 0.46h-1.07V33.35c0 0.9 0.03 1.59 0.09 2.07 0.06 0.48 0.23 0.88 0.5 1.18 0.27 0.3 0.72 0.45 1.34 0.45 0.34 0 0.79-0.06 1.37-0.18 0.57-0.12 1.02-0.18 1.35-0.18 0.46 0 0.88 0.19 1.25 0.56 0.37 0.37 0.56 0.83 0.56 1.38 0 0.93-0.5 1.63-1.51 2.12 -1.01 0.49-2.46 0.74-4.35 0.74 -1.8 0-3.15-0.3-4.08-0.9 -0.93-0.6-1.53-1.44-1.82-2.5 -0.29-1.06-0.43-2.49-0.43-4.27V22.79h-0.76c-0.83 0-1.46-0.2-1.89-0.59 -0.44-0.39-0.65-0.89-0.65-1.49 0-0.6 0.23-1.1 0.68-1.48C40.52 18.84 41.18 18.65 42.05 18.65zM62.68 33.2v4.79c0 1.16-0.27 2.04-0.82 2.62 -0.55 0.58-1.24 0.87-2.08 0.87 -0.83 0-1.51-0.29-2.04-0.88 -0.53-0.59-0.8-1.46-0.8-2.61v-15.98c0-2.58 0.93-3.87 2.8-3.87 0.95 0 1.64 0.3 2.06 0.9 0.42 0.6 0.65 1.49 0.69 2.67 0.69-1.18 1.39-2.07 2.11-2.67 0.72-0.6 1.69-0.9 2.89-0.9 1.21 0 2.38 0.3 3.51 0.9 1.14 0.6 1.7 1.4 1.7 2.4 0 0.7-0.24 1.28-0.73 1.73 -0.48 0.46-1.01 0.68-1.57 0.68 -0.21 0-0.72-0.13-1.52-0.39 -0.81-0.26-1.52-0.39-2.13-0.39 -0.84 0-1.53 0.22-2.06 0.66 -0.53 0.44-0.95 1.1-1.24 1.97 -0.29 0.87-0.5 1.9-0.61 3.1C62.74 30.01 62.68 31.47 62.68 33.2zM80.58 21.36v0.69c1.08-1.33 2.2-2.31 3.36-2.93 1.16-0.62 2.48-0.94 3.95-0.94 1.77 0 3.39 0.46 4.88 1.37 1.49 0.91 2.66 2.24 3.52 4 0.86 1.75 1.29 3.83 1.29 6.22 0 1.77-0.25 3.39-0.75 4.87 -0.5 1.48-1.18 2.72-2.05 3.72 -0.87 1-1.9 1.77-3.08 2.31 -1.19 0.54-2.46 0.81-3.82 0.81 -1.64 0-3.02-0.33-4.13-0.99s-2.18-1.63-3.19-2.9v8.62c0 2.52-0.92 3.79-2.75 3.79 -1.08 0-1.8-0.33-2.15-0.98 -0.35-0.65-0.53-1.6-0.53-2.85V21.4c0-1.09 0.24-1.91 0.72-2.45 0.48-0.54 1.13-0.81 1.96-0.81 0.81 0 1.47 0.28 1.99 0.83C80.32 19.53 80.58 20.32 80.58 21.36zM91.83 29.71c0-1.51-0.23-2.81-0.69-3.9 -0.46-1.09-1.1-1.92-1.92-2.5 -0.82-0.58-1.73-0.87-2.72-0.87 -1.59 0-2.92 0.62-4.01 1.87 -1.09 1.25-1.63 3.08-1.63 5.51 0 2.29 0.54 4.06 1.62 5.33 1.08 1.27 2.42 1.9 4.02 1.9 0.95 0 1.84-0.28 2.65-0.83 0.81-0.55 1.46-1.38 1.96-2.49C91.58 32.62 91.83 31.28 91.83 29.71zM15.68 20.64c-2.85 0-5.17 2.31-5.17 5.17 0 2.85 2.31 5.17 5.17 5.17 2.85 0 5.17-2.31 5.17-5.17C20.84 22.95 18.53 20.64 15.68 20.64z"/><path class="slogan" d="M100.18 2.83h0.2V1.75c0-0.29 0.01-0.52 0.02-0.68 0.02-0.16 0.06-0.31 0.13-0.42 0.07-0.12 0.17-0.22 0.3-0.3 0.13-0.08 0.28-0.12 0.44-0.12 0.23 0 0.43 0.09 0.62 0.26 0.12 0.11 0.2 0.25 0.23 0.42s0.05 0.4 0.05 0.7v1.22h0.66c0.25 0 0.45 0.06 0.58 0.18 0.13 0.12 0.2 0.27 0.2 0.46 0 0.24-0.1 0.41-0.29 0.51 -0.19 0.1-0.46 0.14-0.82 0.14h-0.34v3.3c0 0.28 0.01 0.5 0.03 0.65 0.02 0.15 0.07 0.27 0.16 0.37 0.09 0.09 0.22 0.14 0.42 0.14 0.11 0 0.25-0.02 0.43-0.06 0.18-0.04 0.32-0.06 0.42-0.06 0.14 0 0.27 0.06 0.39 0.17 0.12 0.12 0.17 0.26 0.17 0.43 0 0.29-0.16 0.51-0.47 0.66 -0.32 0.15-0.77 0.23-1.36 0.23 -0.56 0-0.99-0.09-1.27-0.28 -0.29-0.19-0.48-0.45-0.57-0.78 -0.09-0.33-0.13-0.78-0.13-1.33V4.12h-0.24c-0.26 0-0.46-0.06-0.59-0.18 -0.14-0.12-0.2-0.28-0.2-0.47s0.07-0.34 0.21-0.46C99.7 2.89 99.91 2.83 100.18 2.83zM109.38 8.95c-0.43 0.34-0.85 0.59-1.26 0.76 -0.4 0.17-0.86 0.25-1.36 0.25 -0.46 0-0.86-0.09-1.21-0.27 -0.35-0.18-0.62-0.43-0.8-0.74 -0.19-0.31-0.28-0.65-0.28-1.01 0-0.49 0.16-0.91 0.47-1.26s0.74-0.58 1.28-0.7c0.11-0.03 0.4-0.09 0.85-0.18s0.84-0.18 1.16-0.25c0.32-0.08 0.67-0.17 1.05-0.28 -0.02-0.47-0.12-0.82-0.29-1.04 -0.17-0.22-0.52-0.33-1.05-0.33 -0.46 0-0.8 0.06-1.03 0.19 -0.23 0.13-0.43 0.32-0.59 0.57 -0.16 0.25-0.28 0.42-0.35 0.5 -0.07 0.08-0.21 0.12-0.44 0.12 -0.2 0-0.38-0.06-0.52-0.19 -0.15-0.13-0.22-0.3-0.22-0.5 0-0.32 0.11-0.62 0.34-0.92 0.22-0.3 0.57-0.54 1.04-0.74 0.47-0.19 1.06-0.29 1.77-0.29 0.79 0 1.41 0.09 1.86 0.28 0.45 0.19 0.77 0.48 0.96 0.88 0.19 0.4 0.28 0.94 0.28 1.6 0 0.42 0 0.78 0 1.07 0 0.29-0.01 0.62-0.01 0.98 0 0.34 0.06 0.69 0.17 1.06 0.11 0.37 0.17 0.6 0.17 0.71 0 0.18-0.09 0.35-0.26 0.5 -0.17 0.15-0.37 0.23-0.59 0.23 -0.18 0-0.37-0.09-0.55-0.26C109.77 9.53 109.58 9.28 109.38 8.95zM109.26 6.36c-0.26 0.1-0.65 0.2-1.15 0.31 -0.5 0.11-0.85 0.19-1.04 0.24 -0.19 0.05-0.38 0.15-0.55 0.3 -0.17 0.15-0.26 0.35-0.26 0.61 0 0.27 0.1 0.5 0.31 0.69s0.48 0.29 0.81 0.29c0.35 0 0.68-0.08 0.98-0.23 0.3-0.16 0.52-0.36 0.66-0.6 0.16-0.27 0.24-0.72 0.24-1.34V6.36zM116.74 9.22l-1.3-1.91 -1.33 1.91c-0.19 0.27-0.36 0.46-0.49 0.57 -0.13 0.11-0.3 0.17-0.51 0.17 -0.23 0-0.42-0.07-0.58-0.21 -0.16-0.14-0.24-0.31-0.24-0.49 0-0.19 0.12-0.46 0.37-0.81l1.62-2.33 -1.44-1.94c-0.25-0.32-0.37-0.6-0.37-0.83 0-0.18 0.07-0.34 0.22-0.48 0.15-0.14 0.34-0.2 0.58-0.2 0.21 0 0.38 0.06 0.52 0.18s0.3 0.3 0.48 0.56l1.16 1.59 1.13-1.59c0.19-0.26 0.35-0.45 0.49-0.57 0.14-0.11 0.31-0.17 0.52-0.17 0.24 0 0.43 0.07 0.59 0.2 0.16 0.13 0.23 0.29 0.23 0.48 0 0.14-0.03 0.27-0.1 0.39 -0.06 0.12-0.16 0.27-0.29 0.44l-1.44 1.94 1.62 2.33c0.25 0.36 0.38 0.64 0.38 0.82 0 0.19-0.08 0.35-0.24 0.49 -0.16 0.14-0.35 0.2-0.58 0.2 -0.21 0-0.38-0.06-0.52-0.18C117.08 9.67 116.92 9.48 116.74 9.22zM125 7.38V8.87c0 0.36-0.09 0.64-0.26 0.82 -0.17 0.18-0.39 0.27-0.65 0.27 -0.26 0-0.47-0.09-0.64-0.28 -0.17-0.18-0.25-0.46-0.25-0.81V3.88c0-0.81 0.29-1.21 0.87-1.21 0.3 0 0.51 0.09 0.64 0.28 0.13 0.19 0.2 0.47 0.22 0.83 0.21-0.37 0.44-0.65 0.66-0.83 0.23-0.19 0.53-0.28 0.9-0.28s0.74 0.09 1.1 0.28c0.35 0.19 0.53 0.44 0.53 0.75 0 0.22-0.08 0.4-0.23 0.54 -0.15 0.14-0.31 0.21-0.49 0.21 -0.07 0-0.22-0.04-0.48-0.12 -0.25-0.08-0.47-0.12-0.67-0.12 -0.26 0-0.48 0.07-0.64 0.21 -0.17 0.14-0.3 0.34-0.39 0.61 -0.09 0.27-0.16 0.6-0.19 0.97C125.02 6.38 125 6.84 125 7.38zM133.79 6.76h-3.51c0 0.41 0.09 0.77 0.25 1.08 0.16 0.31 0.37 0.55 0.64 0.7 0.27 0.16 0.56 0.24 0.88 0.24 0.21 0 0.41-0.02 0.59-0.07 0.18-0.05 0.35-0.13 0.52-0.24 0.17-0.11 0.32-0.22 0.46-0.35 0.14-0.12 0.32-0.29 0.55-0.5 0.09-0.08 0.22-0.12 0.39-0.12 0.18 0 0.33 0.05 0.45 0.15 0.11 0.1 0.17 0.24 0.17 0.43 0 0.16-0.06 0.35-0.19 0.57 -0.13 0.22-0.32 0.42-0.58 0.62 -0.26 0.2-0.58 0.36-0.97 0.5 -0.39 0.13-0.83 0.2-1.34 0.2 -1.15 0-2.05-0.33-2.69-0.99 -0.64-0.66-0.96-1.55-0.96-2.67 0-0.53 0.08-1.02 0.24-1.47s0.39-0.84 0.69-1.17c0.3-0.32 0.67-0.57 1.12-0.75 0.44-0.17 0.93-0.26 1.47-0.26 0.7 0 1.3 0.15 1.8 0.44 0.5 0.3 0.88 0.68 1.13 1.15 0.25 0.47 0.37 0.95 0.37 1.43 0 0.45-0.13 0.74-0.39 0.88C134.62 6.69 134.26 6.76 133.79 6.76zM130.28 5.74h3.25c-0.04-0.61-0.21-1.07-0.5-1.38 -0.29-0.3-0.66-0.46-1.13-0.46 -0.45 0-0.81 0.16-1.1 0.46C130.52 4.68 130.34 5.14 130.28 5.74zM142.56 7.62c0 0.5-0.12 0.92-0.36 1.27 -0.24 0.35-0.6 0.62-1.07 0.8 -0.47 0.18-1.04 0.27-1.72 0.27 -0.64 0-1.2-0.1-1.66-0.3s-0.8-0.44-1.02-0.74c-0.22-0.3-0.33-0.59-0.33-0.89 0-0.2 0.07-0.37 0.21-0.51 0.14-0.14 0.32-0.21 0.53-0.21 0.19 0 0.33 0.05 0.43 0.14 0.1 0.09 0.2 0.22 0.29 0.39 0.18 0.32 0.4 0.56 0.66 0.72 0.26 0.16 0.61 0.24 1.05 0.24 0.36 0 0.65-0.08 0.88-0.24 0.23-0.16 0.35-0.34 0.35-0.55 0-0.32-0.12-0.55-0.36-0.69 -0.24-0.14-0.63-0.28-1.18-0.41 -0.62-0.15-1.12-0.31-1.51-0.48 -0.39-0.17-0.7-0.39-0.93-0.67 -0.23-0.28-0.35-0.62-0.35-1.02 0-0.36 0.11-0.7 0.32-1.02s0.53-0.57 0.95-0.76c0.42-0.19 0.92-0.29 1.52-0.29 0.46 0 0.88 0.05 1.25 0.14 0.37 0.1 0.68 0.23 0.93 0.39 0.25 0.16 0.44 0.34 0.57 0.54 0.13 0.2 0.19 0.39 0.19 0.58 0 0.21-0.07 0.37-0.21 0.51 -0.14 0.13-0.33 0.2-0.59 0.2 -0.18 0-0.34-0.05-0.47-0.16 -0.13-0.11-0.28-0.26-0.44-0.47 -0.14-0.17-0.3-0.32-0.48-0.42 -0.18-0.11-0.43-0.16-0.75-0.16 -0.32 0-0.59 0.07-0.81 0.21 -0.21 0.14-0.32 0.31-0.32 0.52 0 0.19 0.08 0.34 0.24 0.46 0.16 0.12 0.37 0.22 0.64 0.3 0.27 0.08 0.63 0.17 1.1 0.29 0.56 0.14 1.01 0.3 1.36 0.49 0.35 0.19 0.62 0.41 0.8 0.67C142.47 7 142.56 7.29 142.56 7.62zM149.08 6.76h-3.51c0 0.41 0.09 0.77 0.25 1.08 0.16 0.31 0.37 0.55 0.64 0.7 0.27 0.16 0.56 0.24 0.88 0.24 0.21 0 0.41-0.02 0.59-0.07 0.18-0.05 0.35-0.13 0.52-0.24 0.17-0.11 0.32-0.22 0.46-0.35 0.14-0.12 0.32-0.29 0.55-0.5 0.09-0.08 0.22-0.12 0.39-0.12 0.18 0 0.33 0.05 0.45 0.15s0.17 0.24 0.17 0.43c0 0.16-0.06 0.35-0.19 0.57 -0.13 0.22-0.32 0.42-0.58 0.62 -0.26 0.2-0.58 0.36-0.97 0.5 -0.39 0.13-0.83 0.2-1.34 0.2 -1.15 0-2.05-0.33-2.69-0.99 -0.64-0.66-0.96-1.55-0.96-2.67 0-0.53 0.08-1.02 0.24-1.47 0.16-0.45 0.39-0.84 0.69-1.17 0.3-0.32 0.67-0.57 1.12-0.75 0.44-0.17 0.93-0.26 1.47-0.26 0.7 0 1.3 0.15 1.8 0.44 0.5 0.3 0.88 0.68 1.13 1.15 0.25 0.47 0.37 0.95 0.37 1.43 0 0.45-0.13 0.74-0.39 0.88C149.92 6.69 149.55 6.76 149.08 6.76zM145.57 5.74h3.25c-0.04-0.61-0.21-1.07-0.5-1.38 -0.29-0.3-0.66-0.46-1.13-0.46 -0.45 0-0.81 0.16-1.1 0.46C145.81 4.68 145.64 5.14 145.57 5.74zM156.61 8.95c-0.43 0.34-0.85 0.59-1.26 0.76 -0.4 0.17-0.86 0.25-1.36 0.25 -0.46 0-0.87-0.09-1.21-0.27 -0.35-0.18-0.62-0.43-0.8-0.74 -0.19-0.31-0.28-0.65-0.28-1.01 0-0.49 0.16-0.91 0.47-1.26s0.74-0.58 1.28-0.7c0.11-0.03 0.39-0.09 0.85-0.18s0.84-0.18 1.16-0.25c0.32-0.08 0.67-0.17 1.05-0.28C156.47 4.81 156.38 4.46 156.21 4.24c-0.17-0.22-0.52-0.33-1.05-0.33 -0.45 0-0.8 0.06-1.03 0.19 -0.23 0.13-0.43 0.32-0.59 0.57 -0.16 0.25-0.28 0.42-0.35 0.5 -0.07 0.08-0.22 0.12-0.44 0.12 -0.2 0-0.38-0.06-0.53-0.19 -0.14-0.13-0.22-0.3-0.22-0.5 0-0.32 0.11-0.62 0.33-0.92 0.23-0.3 0.57-0.54 1.05-0.74 0.47-0.19 1.06-0.29 1.77-0.29 0.79 0 1.41 0.09 1.86 0.28 0.45 0.19 0.77 0.48 0.96 0.88 0.18 0.4 0.28 0.94 0.28 1.6 0 0.42 0 0.78-0.01 1.07 0 0.29-0.01 0.62-0.01 0.98 0 0.34 0.06 0.69 0.17 1.06 0.12 0.37 0.17 0.6 0.17 0.71 0 0.18-0.08 0.35-0.26 0.5 -0.17 0.15-0.37 0.23-0.59 0.23 -0.18 0-0.37-0.09-0.55-0.26C157 9.53 156.81 9.28 156.61 8.95zM156.49 6.36c-0.26 0.1-0.65 0.2-1.15 0.31 -0.5 0.11-0.85 0.19-1.04 0.24 -0.19 0.05-0.38 0.15-0.55 0.3 -0.18 0.15-0.26 0.35-0.26 0.61 0 0.27 0.1 0.5 0.31 0.69s0.48 0.29 0.81 0.29c0.36 0 0.68-0.08 0.98-0.23 0.3-0.16 0.52-0.36 0.66-0.6 0.16-0.27 0.24-0.72 0.24-1.34V6.36zM161.85 7.38V8.87c0 0.36-0.09 0.64-0.26 0.82 -0.17 0.18-0.39 0.27-0.65 0.27 -0.26 0-0.47-0.09-0.64-0.28 -0.17-0.18-0.25-0.46-0.25-0.81V3.88c0-0.81 0.29-1.21 0.88-1.21 0.3 0 0.51 0.09 0.64 0.28 0.13 0.19 0.2 0.47 0.22 0.83 0.22-0.37 0.44-0.65 0.66-0.83 0.23-0.19 0.53-0.28 0.9-0.28 0.38 0 0.74 0.09 1.1 0.28 0.35 0.19 0.53 0.44 0.53 0.75 0 0.22-0.07 0.4-0.23 0.54 -0.15 0.14-0.31 0.21-0.49 0.21 -0.07 0-0.22-0.04-0.48-0.12 -0.25-0.08-0.48-0.12-0.67-0.12 -0.26 0-0.48 0.07-0.64 0.21 -0.17 0.14-0.3 0.34-0.39 0.61 -0.09 0.27-0.16 0.6-0.19 0.97C161.87 6.38 161.85 6.84 161.85 7.38zM172.05 7.74c0 0.22-0.07 0.46-0.2 0.72 -0.13 0.25-0.34 0.5-0.61 0.73 -0.27 0.23-0.62 0.41-1.04 0.55 -0.42 0.14-0.88 0.21-1.41 0.21 -1.11 0-1.97-0.32-2.59-0.97 -0.62-0.65-0.93-1.51-0.93-2.6 0-0.74 0.14-1.39 0.43-1.95 0.29-0.57 0.7-1 1.24-1.31s1.18-0.46 1.93-0.46c0.47 0 0.89 0.07 1.28 0.2 0.39 0.14 0.72 0.31 0.99 0.53 0.27 0.21 0.48 0.44 0.62 0.69s0.21 0.47 0.21 0.68c0 0.21-0.08 0.4-0.24 0.55 -0.16 0.15-0.35 0.22-0.58 0.22 -0.15 0-0.27-0.04-0.37-0.11 -0.1-0.08-0.21-0.2-0.33-0.37 -0.22-0.33-0.45-0.58-0.69-0.75 -0.24-0.17-0.54-0.25-0.91-0.25 -0.53 0-0.96 0.21-1.28 0.62 -0.32 0.41-0.49 0.98-0.49 1.7 0 0.34 0.04 0.65 0.12 0.93 0.08 0.28 0.21 0.52 0.36 0.72 0.16 0.2 0.35 0.35 0.57 0.45 0.22 0.1 0.47 0.15 0.74 0.15 0.36 0 0.67-0.08 0.93-0.25 0.25-0.17 0.48-0.42 0.68-0.76 0.11-0.2 0.23-0.36 0.35-0.47 0.13-0.11 0.28-0.17 0.47-0.17 0.22 0 0.4 0.08 0.54 0.25C171.98 7.38 172.05 7.56 172.05 7.74zM175.03 1.09v2.66c0.23-0.26 0.45-0.47 0.67-0.62 0.22-0.15 0.45-0.27 0.72-0.34 0.26-0.08 0.55-0.12 0.85-0.12 0.45 0 0.86 0.1 1.21 0.29 0.35 0.19 0.63 0.47 0.83 0.84 0.13 0.21 0.21 0.45 0.26 0.72 0.04 0.26 0.07 0.57 0.07 0.92V8.87c0 0.36-0.08 0.63-0.25 0.81 -0.16 0.18-0.38 0.28-0.65 0.28 -0.59 0-0.89-0.36-0.89-1.09V5.84c0-0.57-0.09-1.01-0.26-1.32 -0.17-0.31-0.49-0.46-0.97-0.46 -0.32 0-0.61 0.09-0.86 0.27 -0.26 0.18-0.45 0.43-0.58 0.75 -0.1 0.27-0.14 0.74-0.14 1.43V8.87c0 0.35-0.08 0.63-0.24 0.81 -0.16 0.19-0.38 0.28-0.67 0.28 -0.59 0-0.89-0.36-0.89-1.09V1.09c0-0.36 0.08-0.64 0.23-0.82 0.16-0.18 0.37-0.27 0.65-0.27 0.28 0 0.51 0.09 0.67 0.28S175.03 0.73 175.03 1.09zM182.56 2.21c0-0.41 0.11-0.78 0.32-1.11 0.21-0.34 0.52-0.6 0.94-0.8s0.9-0.3 1.45-0.3c0.55 0 1.03 0.1 1.43 0.31 0.4 0.21 0.7 0.48 0.9 0.81s0.3 0.68 0.3 1.04c0 0.49-0.16 0.92-0.49 1.28s-0.8 0.73-1.43 1.11c0.22 0.26 0.42 0.5 0.61 0.73 0.19 0.23 0.37 0.44 0.55 0.64 0.18 0.2 0.33 0.37 0.48 0.51 0.07-0.12 0.17-0.35 0.31-0.69 0.14-0.34 0.27-0.58 0.39-0.73s0.29-0.22 0.51-0.22c0.21 0 0.39 0.07 0.54 0.22 0.16 0.15 0.24 0.32 0.24 0.53 0 0.19-0.07 0.47-0.2 0.82 -0.14 0.35-0.33 0.74-0.59 1.17 0.16 0.14 0.42 0.35 0.77 0.64 0.35 0.29 0.57 0.48 0.65 0.58 0.08 0.1 0.12 0.24 0.12 0.41 0 0.23-0.08 0.42-0.24 0.58 -0.17 0.16-0.35 0.23-0.55 0.23 -0.21 0-0.4-0.07-0.6-0.2 -0.19-0.13-0.6-0.45-1.23-0.97 -0.28 0.27-0.58 0.49-0.88 0.66 -0.3 0.17-0.63 0.3-0.98 0.38 -0.35 0.08-0.74 0.12-1.17 0.12 -0.55 0-1.04-0.08-1.47-0.24 -0.44-0.16-0.8-0.38-1.09-0.65 -0.29-0.27-0.5-0.57-0.64-0.9 -0.14-0.33-0.21-0.67-0.21-1.01 0-0.33 0.05-0.63 0.16-0.9 0.11-0.27 0.25-0.52 0.44-0.74 0.19-0.22 0.43-0.43 0.7-0.63 0.28-0.2 0.6-0.39 0.97-0.58 -0.33-0.41-0.58-0.78-0.74-1.1S182.56 2.55 182.56 2.21zM184.42 5.36c-0.45 0.26-0.78 0.52-1 0.78 -0.22 0.26-0.33 0.57-0.33 0.92 0 0.2 0.04 0.39 0.12 0.58 0.08 0.18 0.2 0.35 0.35 0.51 0.16 0.16 0.34 0.28 0.54 0.36 0.21 0.08 0.42 0.12 0.65 0.12 0.22 0 0.44-0.04 0.65-0.11 0.21-0.07 0.41-0.17 0.6-0.3 0.19-0.13 0.38-0.29 0.59-0.48 -0.39-0.36-0.74-0.72-1.05-1.07C185.23 6.32 184.86 5.88 184.42 5.36zM185.09 3.56c0.45-0.29 0.77-0.52 0.97-0.72 0.2-0.2 0.3-0.43 0.3-0.71 0-0.27-0.1-0.5-0.3-0.68s-0.45-0.28-0.75-0.28c-0.3 0-0.55 0.09-0.76 0.28 -0.21 0.19-0.31 0.41-0.31 0.66 0 0.13 0.04 0.27 0.12 0.42 0.08 0.15 0.17 0.3 0.29 0.45S184.91 3.33 185.09 3.56zM193.29 3.68v0.22c0.34-0.42 0.69-0.72 1.05-0.92 0.37-0.2 0.78-0.29 1.24-0.29 0.55 0 1.06 0.14 1.52 0.43 0.47 0.29 0.83 0.7 1.1 1.25 0.27 0.55 0.4 1.2 0.4 1.95 0 0.55-0.08 1.06-0.23 1.52 -0.16 0.46-0.37 0.85-0.64 1.16 -0.27 0.31-0.59 0.55-0.96 0.72 -0.37 0.17-0.77 0.25-1.19 0.25 -0.51 0-0.94-0.1-1.29-0.31 -0.35-0.21-0.68-0.51-1-0.91v2.69c0 0.79-0.29 1.18-0.86 1.18 -0.34 0-0.56-0.1-0.67-0.31 -0.11-0.2-0.17-0.5-0.17-0.89V3.69c0-0.34 0.08-0.6 0.22-0.76 0.15-0.17 0.35-0.25 0.61-0.25 0.25 0 0.46 0.09 0.62 0.26C193.21 3.1 193.29 3.35 193.29 3.68zM196.81 6.29c0-0.47-0.07-0.88-0.22-1.22 -0.14-0.34-0.34-0.6-0.6-0.78 -0.26-0.18-0.54-0.27-0.85-0.27 -0.49 0-0.91 0.19-1.25 0.58 -0.34 0.39-0.51 0.96-0.51 1.72 0 0.71 0.17 1.27 0.5 1.67 0.34 0.4 0.76 0.59 1.26 0.59 0.3 0 0.57-0.09 0.83-0.26 0.25-0.17 0.46-0.43 0.61-0.78C196.73 7.19 196.81 6.78 196.81 6.29zM200.04 8.87V1.09c0-0.36 0.08-0.63 0.24-0.81s0.38-0.28 0.65-0.28 0.49 0.09 0.66 0.27c0.17 0.18 0.25 0.45 0.25 0.82V8.87c0 0.36-0.08 0.64-0.25 0.82 -0.17 0.18-0.39 0.27-0.65 0.27 -0.26 0-0.48-0.09-0.64-0.28C200.13 9.49 200.04 9.23 200.04 8.87zM208.22 8.95c-0.43 0.34-0.85 0.59-1.26 0.76 -0.4 0.17-0.86 0.25-1.36 0.25 -0.46 0-0.86-0.09-1.21-0.27 -0.35-0.18-0.62-0.43-0.81-0.74 -0.19-0.31-0.28-0.65-0.28-1.01 0-0.49 0.16-0.91 0.47-1.26 0.31-0.35 0.74-0.58 1.28-0.7 0.11-0.03 0.4-0.09 0.85-0.18 0.45-0.09 0.84-0.18 1.16-0.25 0.32-0.08 0.67-0.17 1.05-0.28 -0.02-0.47-0.12-0.82-0.28-1.04 -0.17-0.22-0.52-0.33-1.05-0.33 -0.45 0-0.8 0.06-1.03 0.19 -0.23 0.13-0.43 0.32-0.59 0.57 -0.17 0.25-0.28 0.42-0.35 0.5 -0.07 0.08-0.21 0.12-0.44 0.12 -0.2 0-0.38-0.06-0.52-0.19 -0.15-0.13-0.22-0.3-0.22-0.5 0-0.32 0.11-0.62 0.34-0.92s0.57-0.54 1.04-0.74c0.47-0.19 1.06-0.29 1.77-0.29 0.79 0 1.41 0.09 1.86 0.28 0.45 0.19 0.77 0.48 0.96 0.88s0.28 0.94 0.28 1.6c0 0.42 0 0.78 0 1.07 0 0.29-0.01 0.62-0.01 0.98 0 0.34 0.06 0.69 0.17 1.06 0.11 0.37 0.17 0.6 0.17 0.71 0 0.18-0.09 0.35-0.26 0.5 -0.17 0.15-0.37 0.23-0.59 0.23 -0.18 0-0.37-0.09-0.54-0.26C208.62 9.53 208.43 9.28 208.22 8.95zM208.11 6.36c-0.26 0.1-0.64 0.2-1.15 0.31 -0.5 0.11-0.85 0.19-1.04 0.24 -0.19 0.05-0.38 0.15-0.55 0.3 -0.18 0.15-0.26 0.35-0.26 0.61 0 0.27 0.1 0.5 0.31 0.69 0.21 0.19 0.48 0.29 0.81 0.29 0.35 0 0.68-0.08 0.98-0.23 0.3-0.16 0.52-0.36 0.66-0.6 0.16-0.27 0.24-0.72 0.24-1.34V6.36zM213.32 3.66v0.22c0.32-0.42 0.66-0.72 1.04-0.92 0.38-0.2 0.8-0.29 1.29-0.29 0.47 0 0.9 0.1 1.27 0.31 0.37 0.21 0.65 0.5 0.83 0.87 0.12 0.22 0.2 0.46 0.23 0.71s0.05 0.58 0.05 0.97V8.87c0 0.36-0.08 0.63-0.25 0.81 -0.16 0.18-0.38 0.28-0.64 0.28 -0.27 0-0.48-0.09-0.65-0.28 -0.17-0.19-0.25-0.46-0.25-0.81V5.88c0-0.59-0.08-1.04-0.25-1.36 -0.16-0.31-0.49-0.47-0.98-0.47 -0.32 0-0.61 0.1-0.87 0.29s-0.45 0.45-0.58 0.78c-0.09 0.27-0.13 0.77-0.13 1.5V8.87c0 0.36-0.08 0.64-0.25 0.82 -0.17 0.18-0.39 0.27-0.65 0.27 -0.26 0-0.47-0.09-0.64-0.28 -0.17-0.19-0.25-0.46-0.25-0.81V3.69c0-0.34 0.08-0.6 0.22-0.76 0.15-0.17 0.35-0.25 0.61-0.25 0.16 0 0.3 0.04 0.43 0.11 0.13 0.07 0.23 0.19 0.31 0.34C213.28 3.27 213.32 3.45 213.32 3.66zM221.45 3.66v0.22c0.32-0.42 0.66-0.72 1.04-0.92 0.38-0.2 0.8-0.29 1.29-0.29 0.47 0 0.9 0.1 1.27 0.31 0.37 0.21 0.65 0.5 0.83 0.87 0.12 0.22 0.2 0.46 0.23 0.71s0.05 0.58 0.05 0.97V8.87c0 0.36-0.08 0.63-0.25 0.81 -0.16 0.18-0.38 0.28-0.64 0.28 -0.27 0-0.48-0.09-0.65-0.28 -0.17-0.19-0.25-0.46-0.25-0.81V5.88c0-0.59-0.08-1.04-0.25-1.36 -0.16-0.31-0.49-0.47-0.98-0.47 -0.32 0-0.61 0.1-0.87 0.29s-0.45 0.45-0.58 0.78c-0.09 0.27-0.13 0.77-0.13 1.5V8.87c0 0.36-0.08 0.64-0.25 0.82 -0.17 0.18-0.39 0.27-0.65 0.27 -0.26 0-0.47-0.09-0.64-0.28 -0.17-0.19-0.25-0.46-0.25-0.81V3.69c0-0.34 0.08-0.6 0.22-0.76 0.15-0.17 0.35-0.25 0.61-0.25 0.16 0 0.3 0.04 0.43 0.11 0.13 0.07 0.23 0.19 0.31 0.34C221.41 3.27 221.45 3.45 221.45 3.66zM228.85 1.84c-0.25 0-0.46-0.08-0.64-0.23 -0.18-0.15-0.27-0.37-0.27-0.65 0-0.25 0.09-0.46 0.27-0.63 0.18-0.16 0.39-0.25 0.63-0.25 0.23 0 0.44 0.07 0.62 0.22 0.18 0.15 0.27 0.37 0.27 0.65 0 0.28-0.09 0.49-0.26 0.65C229.3 1.76 229.09 1.84 228.85 1.84zM229.74 3.69V8.87c0 0.36-0.09 0.63-0.26 0.81s-0.39 0.28-0.65 0.28 -0.48-0.09-0.64-0.28c-0.16-0.19-0.25-0.46-0.25-0.81V3.74c0-0.35 0.08-0.62 0.25-0.8 0.17-0.18 0.38-0.27 0.64-0.27s0.48 0.09 0.65 0.27S229.74 3.37 229.74 3.69zM233.22 3.66v0.22c0.32-0.42 0.66-0.72 1.04-0.92 0.38-0.2 0.8-0.29 1.29-0.29 0.47 0 0.9 0.1 1.27 0.31 0.37 0.21 0.65 0.5 0.83 0.87 0.12 0.22 0.2 0.46 0.23 0.71 0.03 0.25 0.05 0.58 0.05 0.97V8.87c0 0.36-0.08 0.63-0.25 0.81 -0.16 0.18-0.38 0.28-0.64 0.28 -0.27 0-0.48-0.09-0.65-0.28 -0.17-0.19-0.25-0.46-0.25-0.81V5.88c0-0.59-0.08-1.04-0.25-1.36 -0.16-0.31-0.49-0.47-0.98-0.47 -0.32 0-0.61 0.1-0.87 0.29 -0.26 0.19-0.45 0.45-0.58 0.78 -0.09 0.27-0.13 0.77-0.13 1.5V8.87c0 0.36-0.08 0.64-0.25 0.82 -0.17 0.18-0.39 0.27-0.65 0.27 -0.26 0-0.47-0.09-0.64-0.28 -0.17-0.19-0.25-0.46-0.25-0.81V3.69c0-0.34 0.08-0.6 0.22-0.76 0.15-0.17 0.35-0.25 0.61-0.25 0.16 0 0.3 0.04 0.43 0.11 0.13 0.07 0.23 0.19 0.31 0.34C233.18 3.27 233.22 3.45 233.22 3.66zM246.32 3.99v5.21c0 0.6-0.06 1.11-0.19 1.54 -0.13 0.43-0.33 0.78-0.61 1.06 -0.28 0.28-0.65 0.49-1.1 0.62 -0.45 0.14-1.02 0.2-1.69 0.2 -0.62 0-1.17-0.09-1.66-0.26 -0.49-0.17-0.86-0.4-1.13-0.67 -0.26-0.27-0.39-0.55-0.39-0.84 0-0.22 0.08-0.4 0.22-0.54 0.15-0.14 0.33-0.21 0.54-0.21 0.26 0 0.49 0.12 0.69 0.35 0.1 0.12 0.2 0.24 0.3 0.36 0.1 0.12 0.22 0.22 0.34 0.31 0.12 0.09 0.27 0.15 0.45 0.19 0.18 0.04 0.38 0.06 0.6 0.06 0.47 0 0.83-0.06 1.08-0.19 0.26-0.13 0.44-0.31 0.54-0.54 0.1-0.23 0.16-0.48 0.18-0.75 0.02-0.26 0.03-0.69 0.04-1.28 -0.28 0.39-0.59 0.68-0.96 0.88 -0.36 0.2-0.79 0.3-1.29 0.3 -0.6 0-1.13-0.15-1.57-0.46 -0.45-0.31-0.79-0.74-1.04-1.29 -0.24-0.55-0.36-1.19-0.36-1.91 0-0.54 0.07-1.03 0.22-1.46 0.15-0.43 0.35-0.8 0.63-1.1 0.27-0.3 0.59-0.52 0.94-0.67 0.35-0.15 0.74-0.23 1.17-0.23 0.51 0 0.95 0.1 1.32 0.29 0.37 0.19 0.72 0.5 1.04 0.92V3.65c0-0.31 0.08-0.55 0.23-0.72s0.35-0.26 0.59-0.26c0.35 0 0.58 0.11 0.69 0.34C246.26 3.23 246.32 3.56 246.32 3.99zM241.12 6.26c0 0.73 0.16 1.28 0.48 1.65s0.73 0.56 1.23 0.56c0.3 0 0.58-0.08 0.84-0.24 0.27-0.16 0.48-0.4 0.65-0.72 0.17-0.32 0.25-0.71 0.25-1.17 0-0.73-0.16-1.3-0.48-1.71 -0.32-0.41-0.75-0.61-1.27-0.61 -0.51 0-0.92 0.19-1.23 0.58C241.27 4.99 241.12 5.54 241.12 6.26z"/>
            </svg>
        </a>
        <?php if($doc->countModules('search') || 
                 $doc->countModules('menu') || 
                 $doc->countModules('social')):
            ?>
        <div class="right-menu">
            <?php if($doc->countModules('search')):?>
                <jdoc:include type="modules" name="search"/>
            <?php endif;?>

            <div class="menu-div">
                <?php if($doc->countModules('menu')):?>
                    <jdoc:include type="modules" name="menu"/>
                <?php endif;?>

                <?php if($doc->countModules('social')):?>
                    <jdoc:include type="modules" name="social"/>
                <?php endif;?>
            </div>
        </div>
        <?php endif;?>

    </div>
    <div class="content-area">
        <?php if($doc->countModules('promo')):?>
            <div class="promo">
                <jdoc:include type="modules" name="promo"/>
            </div>
        <?php endif;?>

        <?php if($doc->countModules('services')):?>
            <jdoc:include type="modules" name="services"/>
        <?php endif;?>

        <?php if($options && (
                            $options == 'com_content' ||
                            $options == 'com_serviceblock' ||
                            $options == 'com_contact' ||
                            $options == 'com_search')):
            ?>
            <jdoc:include type="component" />
        <?php endif;?>

        <?php if($doc->countModules('news')):?>
        <div class="news">
            <div class="news-top">
                <hr class="news-hr">
                <h1 class="news-title">Новости</h1>
                <hr class="news-hr">
            </div>
            <div class="news-content">
                <jdoc:include type="modules" name="news"/>
            </div>
        </div>
        <?php endif;?>

        <footer class="footer">
            <?php if($doc->countModules('footer')):?>
                <jdoc:include type="modules" name="footer"/>
            <?php endif;?>
        </footer>
    </div>
</div>
</body>
</html>