module.exports = {
	content: ["./src/**/*.{html,js}"],
	theme: {
		extend: {
			colors: {
				primary: {
					100: "#f5f5f5",
				},
				secondary: {
					100: "#f5f5f5",
				},
				tertiary: {
					100: "#f5f5f5",
				},
			},
			// fontFamily: {
			// 	font: ["Marcellus", "serif"],
			// },
			fontSize: {
				"title": "3rem",
				"subtitle": "2.5rem",
				"logo": "2rem",
			},
		},
	},
	plugins: [
		require('@tailwindcss/forms'),
	],
}
