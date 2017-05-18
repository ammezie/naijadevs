<template>
    <div>
        <form method="POST" @submit.prevent="subscribe" v-if="!subscribed">
            <div class="ui fluid action input">
                <input type="email" name="email" placeholder="Enter your email address" autocomplete="off" required v-model="email">
                <button type="submit" class="ui primary button">Subscribe</button>
            </div>
        </form>
        <h3 class="ui header" style="color: #fff" v-else v-text="message"></h3>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                subscribed: false,
                email: '',
                message: ''
            };
        },

        methods: {
            subscribe() {
                axios.post('/newsletter/job_notify', { email: this.email })
                    .then(response => {
                        this.subscribed = true;
                        this.message = response.data;
                    })
                    .catch(error => {
                        console.log(error.data);
                    });
            }
        }
    };
</script>