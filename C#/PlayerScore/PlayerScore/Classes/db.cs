using System;
using System.Collections.Generic;
using System.Data.SQLite;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace PlayerScore.Classes
{
    public class db
    {
        public SQLiteConnection sqlite_conn = new SQLiteConnection("Data Source=Players.db; Version=3; New=False: Compress=True");
    }
}
