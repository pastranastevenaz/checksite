axios.get('https://test.testmyssl.xyz/api/allusers')
		.then(response => {
			console.log(response);
			let n = response.data;
			let dataPointsOne = n.map(x =>{
        		let dataPoint = {
          		y: x.valid,
          		label: x.name
        		}
        		return dataPoint;
      		});
      		console.log(dataPointsOne);
      		let dataPointsTwo = n.map(x =>{
        		let dataPoint = {
          		y: x.invalid,
          		label: x.name
        		}
        		return dataPoint;
      		});
      		console.log(dataPointsTwo);
			this.chartOptions.data = {
          type: "bar",
          showInLegend: true,
          name: "Valid",
          color: "#02AF44",
          dataPoints: [
            { y: 10, label: "Ali Iravanian" },
            { y: 3, label: "Antonio Boyce" },
            { y: 1, label: "Billy Lardizabal" },
            { y: 3, label: "Brittny Rosette" },
            { y: 4, label: "David Pozos" },
            { y: 2, label: "Hector Martinez" },
            { y: 2, label: "Jacob Sharp" },
            { y: 1, label: "James Bennett" },
            { y: 1, label: "Jazmin Zertuche" },
            { y: 3, label: "Jessica Knab" },
            { y: 1, label: "John McKenzie" },
            { y: 4, label: "Luke Salva" },
            { y: 1, label: "Paul Plamondon" },
            { y: 1, label: "Paulo Lara" },
            { y: 4, label: "Rayshad Montgomery" },
            { y: 3, label: "William Sullivan" },
            { y: 1, label: "Devon Mix" }
          ]
        },
        {
          type: "bar",
          showInLegend: true,
          name: "Invalid",
          color: "#FD8A17",
          dataPoints: [
            { y: 11, label: "Ali Iravanian" },
            { y: 2, label: "Antonio Boyce" },
            { y: 1, label: "Billy Lardizabal" },
            { y: 1, label: "Brittny Rosette" },
            { y: 1, label: "David Pozos" },
            { y: 1, label: "Hector Martinez" },
            { y: 4, label: "Jacob Sharp" },
            { y: 1, label: "James Bennett" },
            { y: 1, label: "Jazmin Zertuche" },
            { y: 2, label: "Jessica Knab" },
            { y: 3, label: "John McKenzie" },
            { y: 1, label: "Luke Salva" },
            { y: 1, label: "Paul Plamondon" },
            { y: 1, label: "Paulo Lara" },
            { y: 3, label: "Rayshad Montgomery" },
            { y: 2, label: "William Sullivan" },
            { y: 1, label: "Devon Mix" }
          ]
        },

      		console.log("Final One: ");





		})
		
