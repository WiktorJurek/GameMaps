<template>
    <header class="header">
        <div class="navbar bg-base-100">
            <div class="flex-1">
                <router-link :to="{name: 'Games'}" class="btn btn-ghost normal-case text-xl">GameMaps</router-link>
            </div>
            <div class="flex-none">
                <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                    <img src="" />
                    </div>
                </label>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                    <a class="justify-between">
                        Profile
                    </a>
                    </li>
                    <li><router-link :to="{name: 'Login'}">Login</router-link></li>
                    <li><router-link :to="{name: 'Register'}">Register</router-link></li>
                </ul>
                </div>
            </div>
        </div>
    </header>
</template>

<script>

</script>

<style>
</style>