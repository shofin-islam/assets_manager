<template>
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://nsit-bd.com/assets_manager">
      Assets Manager
    </a>
    <div class="navbar-menu is-active">
        <router-link to="/Dashboard" class="navbar-item">Dashboard</router-link>
        <router-link to="/MyAssets" class="navbar-item">My Assets</router-link>
    </div>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
</nav>
</template>