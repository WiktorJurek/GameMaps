<template>
    <header>
        <Header/>    
    </header>

    <main>
        <router-view/>
    </main>
    
    <footer>
        <Footer/>
    </footer>
</template>
  
<script>

    import Header from '../components/common/Header.vue';
    import Footer from '../components/common/Footer.vue';

    export default {
        name: 'App',
        components: {
            Header,
            Footer
        }
    }

</script>
  
<style>
  /* Your global CSS styles */
</style>