<template>
    <div class="toast-container position-fixed  bottom-0 end-0 p-3">
        <transition-group name="toast" appear>
            <div class="toast show" role="note"
                 v-for="message in messages" :key="message.id">
                    <div class="toast-header">
                        <strong class="me-auto">Notification</strong>
                        <button type="button" class="btn-close" aria-label="Close" @click.prevent="close(message.id)"/>
                    </div>
                    <div class="toast-body">
                        {{ message.text }}
                    </div>
            </div>
        </transition-group>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

export default {
    computed: {
        ...mapGetters({
            messages: 'toastMessages',
        }),
    },
    methods: {
        ...mapActions({
            close: 'removeToastMessage',
        }),
        messageTypeClass(message) {
            return `text-bg-${message.type}`
        },
    },
}
</script>
