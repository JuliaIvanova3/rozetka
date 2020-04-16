<template>
    <div class="notification">

        <transition-group
            name="transition-animate"
            class="messages-lists"
        >
            <div 
                class="notification-content"
                v-for="message in messages"
                :key="message.id"
            >
                <div class="content-text">
                    <span>  {{message.name}} </span>
                    <svg class="bi bi-check-circle" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3-3a.5.5 0 11.708-.708L8 9.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M8 2.5A5.5 5.5 0 1013.5 8a.5.5 0 011 0 6.5 6.5 0 11-3.25-5.63.5.5 0 11-.5.865A5.472 5.472 0 008 2.5z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="content-buttons">
                    <button v-if="rightButton.length"> {{rightButton}} </button>
                    <button v-if="leftButton.length"> {{leftButton}} </button>
                </div>
            </div>
        </transition-group>        
        
    </div>
</template>

<script>
export default {
    name: 'notification',
    props: {
        messages: {
            type: Array,
            default: () => {
                return []
            }
        },
        rightButton: {
            type: String,
            default: ''
        },
        leftButton: {
            type: String,
            default: ''
        },
        timeout: {
            type: Number,
            default: 3000
        }

    },
    methods: {
        hideNotifications() {
            let vm = this
            if (this.messages.length) {
                setTimeout(function () {
                vm.messages.splice(vm.messages.length-1,1)
            }, vm.timeout)
            }
        }
    },
    watch: {
        messages() {
            this.hideNotifications()
        }
    },
    mounted() {
        this.hideNotifications()
    }
}
</script>

<style>
.notification {
    position: fixed;
    top: 150px;
    right: 16px;
    z-index: 10;
    display: flex;
    flex-direction: column-reverse;
    
}
/* .messages-lists {
    display: flex;
    flex-direction: column-reverse;
} */
.notification-content {
    padding: 16px;
    border-radius: 4px;
    color: #ffffff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 50px;
    margin-bottom: 16px;
    background: #26ae68;
}
.content-text {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.bi-check-circle {
    margin-left: 16px;
}

.transition-animate-enter {
    transform: translateX(120px);
    opacity: 0;
}
.transition-animate-enter-active {
    transition: all .6s ease;
}
.transition-animate-enter-to {
    opacity: 1;
}
.transition-animate-leave {
    height: 50px;
    opacity: 1;
}
.transition-animate-leave-active {
    transition: transform .6s ease, opacity .6s, height .6s .2s;
}
.transition-animate-leave-to {
    height: 0;
    transform: translateX(120px);
    opacity: 0;
}
.transition-animate-move {
    transition: transform .6s ease;
}
</style>