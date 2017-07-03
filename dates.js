var weekday = new Array(7);  
        weekday[0]=  "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";
          
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth();
        var yyyy = today.getFullYear();
        var monthNames = ["January", "February", "March", "April", "May", "June",
                          "July", "August", "September", "October", "November", "December"
                        ];
          
         //getting the dates to list on the top bar
         
          
        var dayTwo = new Date();
        dayTwo.setDate(dayTwo.getDate() + 1);
        var d2 = dayTwo.getDate();
        var m2 = dayTwo.getMonth();
        var day2 = dayTwo.getDay();
          
               document.getElementById("pageDate").innerHTML = monthNames[m2] + " " + d2 + ", " + yyyy;  
          document.getElementById("intro").innerHTML = weekday[day2] 3+ " " + monthNames[m2] + " " + d2 + ", " + yyyy;  
          
        var dayThree = new Date();
        dayThree.setDate(dayThree.getDate() + 2);
        var d3 = dayThree.getDate();
        var m3 = dayThree.getMonth();
        document.getElementById("day 3").innerHTML = monthNames[m3] + " "  + d3;
          
         var dayFour = new Date();
        dayFour.setDate(dayFour.getDate() + 3);
        var d4 = dayFour.getDate();
        var m4 = dayFour.getMonth();
        document.getElementById("day 4").innerHTML = monthNames[m4] + " "  + d4;
        
           var dayFive = new Date();
        dayFive.setDate(dayFive.getDate() + 4);
        var d5 = dayFive.getDate();
        var m5 = dayFive.getMonth();
        document.getElementById("day 5").innerHTML = monthNames[m5] + " "  + d5;
        
           var daySix = new Date();
        daySix.setDate(daySix.getDate() + 5);
        var d6 = daySix.getDate();
        var m6 = daySix.getMonth();
        document.getElementById("day 6").innerHTML = monthNames[m6] + " "  + d6;
        
        var daySeven = new Date();
        daySeven.setDate(daySeven.getDate() + 6);
        var d7 = daySeven.getDate();
        var m7 = daySeven.getMonth();
        document.getElementById("day 7").innerHTML = monthNames[m7] + " "  + d7;
          