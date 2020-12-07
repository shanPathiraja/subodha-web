<script>
    export default {
        data() {
            return {
                strength: 0,
                validations: [],
                password: null
            }
        },

        methods: {
            validatePassword() {
                this.validations = [
                    (this.password.length > 5),
                    (this.password.search(/[A-Z]/) > -1),
                    (this.password.search(/[0-9]/) > -1),
                    (this.password.search(/[$&+,:;=?@#]/) > -1)
                ];

                this.strength = this.validations.reduce((accumulated, current) => accumulated + current, 0);
            }
        }
    }
</script>
