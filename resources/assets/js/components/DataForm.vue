<script>
	import moment from 'moment';

	export default {
		data() {
			return {
				active: 1,
				firstname: null,
				surname: null,
				email: null,
				telephone: null,
				gender: 'select',
				comments: null,
				day: null,
				month: null,
				year: null,
				errors: []
			}
		},
		methods: {
			next() {
				if(this.validate()) this.active++;
			},
			validate() {
				this.errors = [];
				switch(this.active) {
					case 1:
						if(!this.firstname) this.errors.push('First name required');
						if(!this.surname) this.errors.push('Surname required');
						if(!this.email) this.errors.push('Email required');
						if(this.email && !this.checkEmail(this.email)) this.errors.push('Valid Email required');
					break;
					case 2:
						if(!this.telephone) this.errors.push('Telephone number is required');
						if(this.gender == 'select') this.errors.push('Gender is required');

						if(!this.day || !this.month || !this.year) {
							this.errors.push('Full date of birth is required');
						} else {
							if(this.day <= 0 || this.day > 31) this.errors.push('Day must be between 01 and 31');

							if(this.month <= 0 || this.month > 12) this.errors.push('Month must be between 01 and 12');

							if(this.year.length !== 4) this.errors.push('Full year must be provided YYYY');
						}

					break;
				}

				if(this.errors.length == 0) return true;
			},
			checkEmail(email) {
				var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    			return re.test(String(email).toLowerCase());
			},
			checkValue() {
				if(this.day.length == 1) this.day = "0" + this.day;
				if(this.month.length == 1) this.month = "0" + this.month;
			}
		},
		computed: {
			dob() {
				return moment(this.year + this.month + this.day).format('DD/MM/YYYY');
			}
		}

	}

</script>