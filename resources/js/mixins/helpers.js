export default {
    methods: {
        setSlug() {
            this.slug = this.name.replace(/^\s+|\s+$/g, ''); // trim
            this.slug = this.slug.toLowerCase();

            // remove accents, swap ñ for n, etc
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to   = "aaaaeeeeiiiioooouuuunc------";
            for (var i=0, l=from.length ; i<l ; i++) {
                this.slug = this.slug.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            this.slug = this.slug.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes
        },

        addMonth(month = 2) {
            let date = new Date;

            return date.setMonth( date.getMonth() + month );
        },

        async getUser(username) {
            return await axios.get(`/api/users/${username}`);
        },

        objectsAreSame(objx, objy) {
           let objectsAreSame = true;

           for (let propertyName in objx) {
                if (objx[propertyName] !== objy[propertyName]) {
                    objectsAreSame = false;

                    break;
                }
           }

           return objectsAreSame;
        }
    }
}
