{
/**
* @file template file for creating drop-down login form uses imagecms.api.js for submiting and appending validation errors
*/
}
<div class="drop-enter drop drop-style" id="enter">
    <button type="button" class="icon_times_drop" data-closed="closed-js"></button>
    <div class="drop-header">
        <div class="title">
            {lang('Авторизация','box')}
        </div>
    </div>
    <div class="drop-content">
        <div class="inside-padd">
            <div class="horizontal-form">
                <form method="post" id="login_form" onsubmit="ImageCMSApi.formAction('{site_url("/auth/authapi/login")}', '#login_form');
                        return false;">
                    <label>
                        <span class="title">{lang('Почта','box')}</span>
                        <span class="frame-form-field">
                            <input type="text" name="email"/>
                            <span class="must">*</span>
                        </span>
                    </label>
                    <label>
                        <span class="title">{lang('Пароль','box')}</span>
                        <span class="frame-form-field">
                            <input type="password" name="password"/>
                            <span class="must">*</span>
                        </span>
                    </label>
                    <!-- captcha block -->
                    <lable id="captcha_block">

                    </lable>
                    <div class="frame-label">
                        <span class="title">&nbsp;</span>
                        <div class="frame-form-field">
                            <div class="clearfix">
                                <span class="btn-form f_l m-r_20">
                                    <button type="submit">
                                        <span class="icon_enter_drop"></span>
                                        <span class="text-el">{lang('Войти','box')}</span>
                                    </button>
                                </span>
                                <div class="f_l neigh-buttonform f-s_0">
                                    <span class="helper"></span>
                                    <button type="button" class="d_l_3" data-drop=".drop-forgot" data-source="{site_url('auth/forgot_password')}">{lang('Напомнить пароль','box')}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {form_csrf()}
                </form>
            </div>
        </div>
    </div>
    <div class="drop-footer">
        <div class="inside-padd">
            <div class="horizontal-form">
                <div class="frame-label">
                    <span class="title">&nbsp;</span>
                    <div class="frame-form-field">
                        <div class="help-block">{lang('Для новых покупателей нашего магазина','box')}:</div>
                        <a href="/auth/register">{lang('Регистрация','box')}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>