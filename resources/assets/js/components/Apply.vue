<template>
    <select
        name="apply"
        class="ui dropdown"
        v-model="apply"
        required>
        <option :value="type.value" v-for="type in types">{{ type.text }}</option>
    </select>
</template>

<script>
    export default {
        props: [
            'applyMedium',
        ],

       data() {
        return {
            apply: 'url',
            types: [
                {
                    value: 'url',
                    text: 'External URL'
                },
                {
                    value: 'email',
                    text: 'Email'
                }
            ]
        }
       }
    }
</script>
