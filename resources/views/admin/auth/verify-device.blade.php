<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://github.githubassets.com/assets/frameworks-8c550109d58e0353afdf1a37a05301c2.css" />
    <link rel="stylesheet" href="https://github.githubassets.com/assets/site-7ea9d9b5acaa80b0a67107f15e9e4e1f.css" />
    <link rel="stylesheet" href="https://github.githubassets.com/assets/github-36f60e1fc11f3e85242ffa676dd886fe.css" />

    <meta name="viewport" content="width=device-width">

    <title>Bunny | Verify Device</title>
    <link rel="icon" class="js-site-favicon" type="image/svg+xml" href="{{ asset('public/media/logos/Splash_Screen_Tab.ico')  }}">

</head>

<body class="logged-out env-production page-responsive session-authentication">

<div class="position-relative js-header-wrapper ">
    <span class="progress-pjax-loader width-full js-pjax-loader-bar Progress position-fixed">
    <span style="background-color: #79b8ff;width: 0%;" class="Progress-item progress-pjax-loader-bar "></span>
</span>

    <div class="header header-logged-out width-full pt-5 pb-4" role="banner">
        <div class="container clearfix width-full text-center">
            <a class="header-logo" href="" aria-label="Homepage" data-ga-click="(Logged out) Header, go to homepage, icon:logo-wordmark">
                <img src="{{ asset('public/media/logos/Bunny_logo_Mobile_view.png') }}">
            </a>
        </div>
    </div>

</div>
<a href="{{ route('admin.login') }}">Back</a>
<div
    class="application-main "
    data-commit-hovercards-enabled
    data-discussion-hovercards-enabled
    data-issue-and-pr-hovercards-enabled
>
    <main id="js-pjax-container" data-pjax-container>

        <div id="login" class="auth-form px-3">
            <div class="auth-form-header p-0">
                <h1>Device verification</h1>
            </div>

            <div class="auth-form-body mt-3">
                <form action="{{ route('admin.dashboard') }}" accept-charset="UTF-8" method="post">
                  @csrf
                    <!-- OTP Code -->
                    <label for="otp">
                        Device verification code
                    </label>
                    <input type="text" name="otp" id="otp" value="" autocomplete="one-time-code" autofocus="autofocus" class="form-control input-block" inputmode="numeric" pattern="([0-9]{6})|([0-9a-fA-F]{5}-?[0-9a-fA-F]{5})" placeholder="6-digit code" />

                    <button class="btn btn-primary btn-block" data-disable-with="Verifying…" type="submit">Verify</button>
                </form>  </div>

            <div class="two-factor-help clearfix">
                <p>
                    <svg class="octicon octicon-mail" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M1.75 2A1.75 1.75 0 000 3.75v.736a.75.75 0 000 .027v7.737C0 13.216.784 14 1.75 14h12.5A1.75 1.75 0 0016 12.25v-8.5A1.75 1.75 0 0014.25 2H1.75zM14.5 4.07v-.32a.25.25 0 00-.25-.25H1.75a.25.25 0 00-.25.25v.32L8 7.88l6.5-3.81zm-13 1.74v6.441c0 .138.112.25.25.25h12.5a.25.25 0 00.25-.25V5.809L8.38 9.397a.75.75 0 01-.76 0L1.5 5.809z"></path></svg>
                    We just sent your authentication code via email to k***************@gmail.com.
                    The code will expire at 6:06PM IST.
                </p>

                <p>
                    <form class="inline-form" action="" accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token" value="" />
                    <button type="submit" class="btn-link">Re-send the code</button>.
                </form></p>
            </div>
        </div>

    </main>
</div>

<div class="footer container-lg p-responsive py-6 mt-6 f6" role="contentinfo">
    <ul class="list-style-none d-flex flex-justify-center">
        <li class="mr-3"><a href="" data-ga-click="Footer, go to terms, text:terms">Terms</a></li>
        <li class="mr-3"><a href="" data-ga-click="Footer, go to privacy, text:privacy">Privacy</a></li>
        <li class="mr-3"><a href="" data-ga-click="Footer, go to security, text:security">Security</a></li>
        <li><a class="link-gray" data-ga-click="Footer, go to contact, text:contact" href="javascript:void(0)">Contact Bunny</a></li>
    </ul>
</div>


</body>
</html>

