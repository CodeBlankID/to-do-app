<template>
    <aside class="main-sidebar sidebar-light-primary border">
    <a href="javascript:void(0)" class="brand-link text-center">
        <span class="brand-text font-weight-dark">To Do App</span>
    </a>
    <div class="sidebar shadow-none">
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item border-bottom">
                    <RouterLink to="/" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </RouterLink>
                </li>
                <li class="nav-item border-bottom">
                    <RouterLink to="/task"  class="nav-link">
                        <i class="nav-icon fas fa-check"></i>
                        <p>Task</p>
                    </RouterLink>
                </li>
            </ul>
        </nav>
    </div>
</aside>

</template>