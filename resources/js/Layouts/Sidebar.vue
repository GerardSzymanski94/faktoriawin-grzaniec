<template>
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main"
         style="min-height: 100vh;margin: 0px;position: relative">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#sidenav-collapse-main"
                    aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand pt-0" href="">
                <h1 class="text-blue" style="font-weight: bold; font-family: 'NucleoIcons'; ">

                </h1>

            </a>
            <!-- User -->
            <ul class="nav align-items-center d-md-none">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="/img/theme/team-1-800x800.jpg">
                        </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0"></h6>
                        </div>
                        <a href="" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span></span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span></span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ni ni-calendar-grid-58"></i>
                            <span></span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span></span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                            <i class="ni ni-user-run"></i>
                            <span></span>
                        </a>
                    </div>
                </li>
            </ul>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Collapse header -->
                <div class="navbar-collapse-header d-md-none">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="">
                                <img src="/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                    data-target="#sidenav-collapse-main" aria-controls="sidenav-main"
                                    aria-expanded="false"
                                    aria-label="Toggle sidenav">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Form -->
                <form class="mt-4 mb-3 d-md-none">
                    <div class="input-group input-group-rounded input-group-merge">
                        <input type="search"
                               class="form-control form-control-rounded form-control-prepended"
                               placeholder="" aria-label="Search">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-search"></span>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Navigation -->
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" :href="'/administracja'">
                            <i class="ni ni-tv-2 text-primary"></i> Zgłoszenia
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" :href="'/administracja/mail/all'">
                            <i class="ni ni-tv-2 text-primary"></i> Wysłane maile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" :href="'/administracja'">
                            <i class="ni ni-tv-2 text-primary"></i> Statystyki
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" :href="'/administracja/winners'">
                            <i class="ni ni-tv-2 text-primary"></i> Zwycięzcy
                        </a>
                    </li>
<!--                    <li class="nav-item">
                        <a class="nav-link" :href="'/administracja'">
                            <i class="ni ni-tv-2 text-primary"></i> Export
                        </a>
                    </li>-->

                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
            </div>
        </div>
    </nav>
</template>
<script>

export default {
    data() {
        return {
            url: null,
        }

    },
    props: {},
    created() {
        const p = new Promise((resolve, reject) => {
        })
            .then(result => console.log(`Success ${result}`))
            .catch(result => console.log(`Error ${result}`));

        this.url = process.env.MIX_APP_URL;
    },


}

</script>
