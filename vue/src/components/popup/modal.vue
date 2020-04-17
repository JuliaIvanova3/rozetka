<template>
    <div class="modal-wrapper" ref="modal_wrapper">
        <div class="modal">
            <div class="header">
                <p class="header-info">Info window </p>
                <span class="close" @click="close">X</span>
            </div>
            <div class="content">
                <p> {{info}} </p>
                <p>
                    You can go to our dashboard and watch all info about your orders!
                </p>
            </div>
            <div class="footer">
                <button class="btn btn-success" @click="redirect">Ok</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'modal',
    data() {
        return {
            info: 'Thanks for yours order...'
        }
    },
    methods: {
        redirect() {
            this.$emit('redirect');
        },
        close() {
            this.$emit('close');
        }
    },
    mounted() {
        let vm = this;
      document.addEventListener('click', function (item) {
        if (item.target === vm.$refs['modal_wrapper']) {
          vm.close()
        }
      })
    }
}
</script>

<style>
.modal-wrapper {
     background: rgba(64,64,64, .4);
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    right: 0;
    left: 0;
    top: 0;
    bottom: 0;
}
.modal {
    position: fixed;
    top: 150px !important;
    right: 16px;
    display: flex !important;
    background: #ffffff;
    flex-direction: column !important;
    height: 180px !important;
    width: 800px !important;
    margin-left: 350px;
    box-shadow: 0 0 17px 0 #e7e7e7;
    border-radius: 15px 15px 15px 15px;
}
.header {
    padding: 8px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #26ae68;
    flex-direction: row !important;
    color: #ffffff;
    height: 40px;
}
.header-info {
    margin-bottom: 0;
}
.content {
    height: 90px;
    padding: 10px;
}
.footer {
    padding: 8px;
    background: #e7e7e7;
    height: 55px;
}
.bth {
    margin-top: 8px !important;
}
.close {
    cursor: pointer;
}

</style>