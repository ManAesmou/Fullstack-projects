using System;
using System.Collections.Generic;
using System.Data.SQLite;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using static System.Windows.Forms.VisualStyles.VisualStyleElement.ListView;
using iText.Layout.Borders;
using iText.StyledXmlParser.Jsoup.Select;

namespace PlayerScore.Classes.Players
{
    public class DataHandling : db
    {
        //Private of variables.
        private DataTable dt = new DataTable();
        private string err = "0";
        private int found = 0;

        //Public of variables.
        public DataTable Dt
        {
            get { return dt; }
            set { dt = value; }
        }
        public string Err
        {
            get { return err; }
            set { err = value;}
        }
        public int Found
        {
            get { return found; }
            set { found = value; }
        }


        // PLAYERS //
        public void getPlayers()
        {
            try
            {
                sqlite_conn.Open();

                SQLiteDataReader sqlite_datareader;
                SQLiteCommand sqlite_cmd;

                sqlite_cmd = sqlite_conn.CreateCommand();
                sqlite_cmd.CommandText = "SELECT * FROM player ORDER BY playerID";

                sqlite_datareader = sqlite_cmd.ExecuteReader();
                dt.Load(sqlite_datareader);

                sqlite_conn.Close();
            }
            catch (Exception ex)
            {
                this.Err = ex.ToString();
            }
        }

        public void getPlayer(string sId)
        {
            try
            {
                int iId = int.Parse(sId);

                sqlite_conn.Open();

                SQLiteDataReader sqlite_datareader;
                SQLiteCommand sqlite_cmd;

                sqlite_cmd = sqlite_conn.CreateCommand();
                sqlite_cmd.CommandText = "SELECT * FROM player WHERE playerID = " + iId;

                sqlite_datareader = sqlite_cmd.ExecuteReader();
                dt.Load(sqlite_datareader);

                sqlite_conn.Close();
            }
            catch (Exception ex)
            {
                this.Err = ex.ToString();
            }
        }

        public void updatePlayer(string sId, string sFirstname, string sLastname, string sEmail, string sPassword)
        {
            try
            {
                int iId = Int32.Parse(sId);

                sqlite_conn.Open();

                SQLiteCommand sqlite_cmd;
                sqlite_cmd = sqlite_conn.CreateCommand();
                sqlite_cmd.CommandText = "UPDATE player SET firstname = '" + sFirstname + "', lastname = '" + sLastname + "', email = '" + sEmail + "', password = '" + sPassword + "' WHERE playerID = " + iId;
                sqlite_cmd.ExecuteNonQuery();
                sqlite_conn.Close();
            }
            catch (Exception ex)
            {
                this.Err = ex.ToString();
            }
        }

        public void newPlayer(string sFirstname, string sLastname, string sEmail, string sPassword)
        {
            try
            {
                sqlite_conn.Open();

                SQLiteDataReader sqlite_datareader;
                SQLiteCommand sqlite_cmd;

                sqlite_cmd = sqlite_conn.CreateCommand();
                sqlite_cmd.CommandText = "SELECT * FROM player WHERE email = '" + sEmail + "'";

                sqlite_datareader = sqlite_cmd.ExecuteReader();

                // Check if there is a row.
                if (sqlite_datareader.HasRows)
                {
                    this.Found = 1;

                    sqlite_datareader.Close();
                    sqlite_conn.Close();

                    return;
                }
                else
                {
                    // Add new customer.
                    sqlite_cmd = sqlite_conn.CreateCommand();
                    sqlite_cmd.CommandText = "INSERT INTO player (firstname, lastname, email, password) VALUES ('" + sFirstname + "', '" + sLastname + "', '" + sEmail + "', '" + sPassword + "')";
                    sqlite_datareader = sqlite_cmd.ExecuteReader();

                    sqlite_conn.Close();
                }
            }
            catch (Exception ex)
            {
                this.Err = ex.ToString();
            }
        }

        public void removePlayer(string sId)
        {
            try
            {
                int iId = Int32.Parse(sId);

                sqlite_conn.Open();

                SQLiteCommand sqlite_cmd;
                sqlite_cmd = sqlite_conn.CreateCommand();
                sqlite_cmd.CommandText = "DELETE FROM player WHERE playerID = " + iId;
                sqlite_cmd.ExecuteNonQuery();
                sqlite_conn.Close();
            }
            catch (Exception ex)
            {
                this.Err = ex.ToString();
            }
        }








        // SCORES //
        public void getScore(string sId)
        {
            try
            {
                int iId = int.Parse(sId);

                sqlite_conn.Open();

                SQLiteDataReader sqlite_datareader;
                SQLiteCommand sqlite_cmd;

                sqlite_cmd = sqlite_conn.CreateCommand();
                sqlite_cmd.CommandText = "SELECT * FROM score WHERE playerID = " + iId + " ORDER BY points";

                sqlite_datareader = sqlite_cmd.ExecuteReader();
                dt.Load(sqlite_datareader);

                sqlite_conn.Close();
            }
            catch (Exception ex)
            {
                this.Err = ex.ToString();
            }
        }

        public void newScore(string sId, string sPoints, string sDate)
        {
            try
            {
                sqlite_conn.Open();

                SQLiteDataReader sqlite_datareader;
                SQLiteCommand sqlite_cmd;

                sqlite_cmd = sqlite_conn.CreateCommand();
                sqlite_cmd.CommandText = "SELECT * FROM score WHERE date = '" + sDate + "'";

                sqlite_datareader = sqlite_cmd.ExecuteReader();

                // Check if there is a row.
                if (sqlite_datareader.HasRows)
                {
                    this.Found = 1;

                    sqlite_datareader.Close();
                    sqlite_conn.Close();

                    return;
                }
                else
                {
                    // Add new score.
                    sqlite_cmd = sqlite_conn.CreateCommand();
                    sqlite_cmd.CommandText = "INSERT INTO score (playerID, date, points) VALUES ('" + sId + "', '" + sDate + "', '" + sPoints + "')";
                    sqlite_datareader = sqlite_cmd.ExecuteReader();

                    sqlite_conn.Close();
                }
            }
            catch (Exception ex)
            {
                this.Err = ex.ToString();
            }
        }

        public void getDateScore(string sDate)
        {
            try
            {
                sqlite_conn.Open();

                SQLiteDataReader sqlite_datareader;
                SQLiteCommand sqlite_cmd;
                sqlite_cmd = sqlite_conn.CreateCommand();
                sqlite_cmd.CommandText = "SELECT * FROM score WHERE date = '" + sDate + "'";
                sqlite_datareader = sqlite_cmd.ExecuteReader();
                dt.Load(sqlite_datareader);

                sqlite_conn.Close();
            }
            catch (Exception ex)
            {
                this.Err = ex.ToString();
            }
        }

        public void updateScore(string sId, string sDate, string sPoints)
        {
            try
            {
                int iId = int.Parse(sId);

                sqlite_conn.Open();

                SQLiteCommand sqlite_cmd;
                sqlite_cmd = sqlite_conn.CreateCommand();
                sqlite_cmd.CommandText = "UPDATE score SET points = '" + sPoints + "', date = '" + sDate + "' WHERE date = '" + sDate + "' AND playerID = " + iId;
                sqlite_cmd.ExecuteNonQuery();
                sqlite_conn.Close();
            }
            catch (Exception ex)
            {
                this.Err = ex.ToString();
            }
        }

        public void removeScore(string sDate)
        {
            try
            {
                sqlite_conn.Open();

                SQLiteCommand sqlite_cmd;
                sqlite_cmd = sqlite_conn.CreateCommand();
                sqlite_cmd.CommandText = "DELETE FROM score WHERE date = '" + sDate +"'";
                sqlite_cmd.ExecuteNonQuery();
                sqlite_conn.Close();
            }
            catch (Exception ex)
            {
                this.Err = ex.ToString();
            }
        }







        // RANKING //
        /*
        public void getMaxPoints(string sId)
        {
            try
            {
                int iId = int.Parse(sId);

                sqlite_conn.Open();
                dt.Clear();

                SQLiteDataReader sqlite_datareader;
                SQLiteCommand sqlite_cmd;
                sqlite_cmd = sqlite_conn.CreateCommand();
                sqlite_cmd.CommandText = "SELECT MAX(points) AS max_points FROM score WHERE playerID = " + iId;
                sqlite_datareader = sqlite_cmd.ExecuteReader();
                dt.Load(sqlite_datareader);

                sqlite_conn.Close();
            }
            catch (Exception ex)
            {
                this.Err = ex.ToString();
            }
        }*/

        public void getRanking()
        {
            try
            {

                sqlite_conn.Open();

                SQLiteDataReader sqlite_datareader;
                SQLiteCommand sqlite_cmd;
                sqlite_cmd = sqlite_conn.CreateCommand();
                sqlite_cmd.CommandText = "SELECT player.firstname, player.lastname, MAX(points) AS max_points FROM score INNER JOIN player ON score.playerID = player.playerID GROUP BY score.playerID ORDER BY score.points DESC";
                sqlite_datareader = sqlite_cmd.ExecuteReader();
                dt.Load(sqlite_datareader);

                sqlite_conn.Close();
            }
            catch (Exception ex)
            {
                this.Err = ex.ToString();
            }
        }

        // HISTORY //

        public void getHistory(string sId, string sDateBegin, string sDateEnd)
        {
            try
            {
                int iId = int.Parse(sId);

                sqlite_conn.Open();

                SQLiteDataReader sqlite_datareader;
                SQLiteCommand sqlite_cmd;
                sqlite_cmd = sqlite_conn.CreateCommand();
                // date form: BETWEEN '1996-07-01' AND '1996-07-31';
                sqlite_cmd.CommandText = "SELECT player.firstname, player.lastname, score.points, score.date FROM score INNER JOIN player ON score.playerID = player.playerID WHERE score.playerID = " + iId + " AND score.date BETWEEN '" + sDateBegin + "' AND '" + sDateEnd + "' ORDER BY score.date DESC";
                sqlite_datareader = sqlite_cmd.ExecuteReader();
                dt.Load(sqlite_datareader);

                sqlite_conn.Close();
            }
            catch (Exception ex)
            {
                this.Err = ex.ToString();
            }
        }
    }
}
