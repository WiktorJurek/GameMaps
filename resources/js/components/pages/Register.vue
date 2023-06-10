<template>
    <div class="relative flex flex-col justify-center h-screen overflow-hidden">
        <div class="w-full p-6 m-auto bg-white rounded-md shadow-md lg:max-w-xl">
            <h1 class="text-3xl font-semibold text-center text-purple-700">GameMaps</h1>
            <form class="space-y-4">
                <div>
                    <label class="label">
                        <span class="text-base label-text">Name</span>
                    </label>
                    <input type="text" placeholder="Name" class="w-full input input-bordered input-primary" />
                </div>
                <div>
                    <label class="label">
                        <span class="text-base label-text">Email</span>
                    </label>
                    <input type="text" placeholder="Email Address" class="w-full input input-bordered input-primary" />
                </div>
                <div>
                    <label class="label">
                        <span class="text-base label-text">Password</span>
                    </label>
                    <input type="password" placeholder="Enter Password"
                        class="w-full input input-bordered input-primary" />
                </div>
                <div>
                    <label class="label">
                        <span class="text-base label-text">Confirm Password</span>
                    </label>
                    <input type="password" placeholder="Confirm Password"
                        class="w-full input input-bordered input-primary" />
                </div>
                <div>
                    <button class="btn btn-block btn-primary">Sign Up</button>
                </div>
                <span>Already have an account ?
                    <router-link :to="{name: 'Login'}" class="text-blue-600 hover:text-blue-800 hover:underline">Login</router-link></span>
            </form>
        </div>
    </div>
</template>

<script>

</script>

<style>
</style>