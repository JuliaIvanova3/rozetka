<template>
    <div class="main-home">
        <h1>{{$t('homePage')}}</h1>
        <div class="home-content">
             <div class="card card-default">
            <div class="card-header"> {{$t('homePage')}} </div>
            <div class="card-body">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt amet tempora sint dolor nam quam quos inventore odio hic, enim beatae nulla in tenetur odit natus facere voluptas excepturi deleniti? Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur sit eligendi rem et minus dolor hic, placeat eum sequi ipsa, debitis ex magni. Hic laudantium consectetur aliquid eos fuga cumque.
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt amet tempora sint dolor nam quam quos inventore odio hic, enim beatae nulla in tenetur odit natus facere voluptas excepturi deleniti? Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur sit eligendi rem et minus dolor hic, placeat eum sequi ipsa, debitis ex magni. Hic laudantium consectetur aliquid eos fuga cumque.
                </p>
            </div>
        </div>
        </div>
    </div>
</template>

<script>


export default {
    name: 'main-home',
    data() {
        return {
        }
    },
}
</script>

<style>
.home-content {
    margin-bottom: 16px;
}
</style>