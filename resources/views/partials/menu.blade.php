<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-logs") || request()->is("admin/user-logs/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-user-cog c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('utility_management_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-industry c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.utilityManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('utility_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.utility-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/utility-categories") || request()->is("admin/utility-categories/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.utilityCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('payment_gateway_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.payment-gateways.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/payment-gateways") || request()->is("admin/payment-gateways/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.paymentGateway.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('utility_account_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.utility-accounts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/utility-accounts") || request()->is("admin/utility-accounts/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-address-book c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.utilityAccount.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('invoice_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.invoices.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/invoices") || request()->is("admin/invoices/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.invoice.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('payment_history_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.payment-histories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/payment-histories") || request()->is("admin/payment-histories/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-history c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.paymentHistory.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('statistic_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-chalkboard c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.statistic.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('account_statistic_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.account-statistics.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/account-statistics") || request()->is("admin/account-statistics/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-wrench c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.accountStatistic.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('electricity_usage_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.electricity-usages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/electricity-usages") || request()->is("admin/electricity-usages/*") ? "active" : "" }}">
                                <i class="fa-fw far fa-chart-bar c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.electricityUsage.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('water_usage_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.water-usages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/water-usages") || request()->is("admin/water-usages/*") ? "active" : "" }}">
                                <i class="fa-fw far fa-chart-bar c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.waterUsage.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('bill_forecast_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.billForecast.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('electricity_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.electricities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/electricities") || request()->is("admin/electricities/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-bolt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.electricity.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('water_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.waters.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/waters") || request()->is("admin/waters/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-tint c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.water.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('bill_tariff_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.bill-tariffs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/bill-tariffs") || request()->is("admin/bill-tariffs/*") ? "active" : "" }}">
                    <i class="fa-fw fas fa-pen c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.billTariff.title') }}
                </a>
            </li>
        @endcan
        @can('support_information_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.support-informations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/support-informations") || request()->is("admin/support-informations/*") ? "active" : "" }}">
                    <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.supportInformation.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>