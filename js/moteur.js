
page = "<!DOCTYPE html>" +
    "<html>" +
    "<meta http-equiv='content-type' content='text/html;charset=utf-8' />" +
    "<head><meta charset='utf-8'> " +
    "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">" +
    "<title>Résultats de la recherche</title>" +
    "<link href='assets/img/fvicon.png' rel='icon' type='image/png'>" +
    "</head><body bgcolor='white'>" +
    "<center style='margin-top: 5%'>" +
    "<h3>Résultats de recherche</h3>" +
    "<table border=0 cellspacing=10 width=80%>";

  function recherche() {
        win=window.open("","");
        win.document.write(page);

        txt = $("#recho").val().split(" ");

      //console.log(txt);
        fnd = [];
        total=0;
        for (i = 0; i < item.length; i++) {
            fnd[i] = 0; order = [0, 4, 2, 3];
            for (j = 0; j < order.length; j++)
                for (k = 0; k < txt.length; k++)
                    if (item[i][order[j]].toLowerCase().indexOf(txt[k]) > -1 && txt[k] !== "")
                    {
                        fnd[i] += (j+1);
                    }

        }
        for (i = 0; i < fnd.length; i++)
        {
            n = 0; w = -1;
            for (j = 0;j < fnd.length; j++)
            {
                if (fnd[j] > n)
                {
                    n = fnd[j];
                    w = j;

                    if (w > -1)
                    {
                        total += shows(w, win, n);
                        fnd[w] = 0;
                    }

                }


            }


        }
       win.document.write("</table><br>Pages trouvée(s): "+total+"<br></body></html>");
        win.document.close();
    }
    function shows(which,wind,num)
    {
        link = item[which][1] + item[which][0];
        line = "<tr><td><a href='"+link+"'>"+item[which][2]+"</a> <br>";
        line += item[which][4] + "<br></td></tr>";
        wind.document.write(line);
        return 1;
    }