using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SQLite;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using iText.Kernel.Pdf;
using iText.Layout;
using iText.Layout.Element;
using iText.Layout.Properties;
using ClassLibraryPlayers;
using static System.Windows.Forms.VisualStyles.VisualStyleElement.ListView;

namespace PlayerScore
{
    public partial class frmPlayerManagement : Form
    {
        public frmPlayerManagement()
        {
            InitializeComponent();
        }

        // Download the form data.
        private void Form1_Load(object sender, EventArgs e)
        {
            loadCombo();
        }

        // Get the players data from database and insert to the combobox. 
        private void loadCombo()
        {
            DataHandling comboLoader = new DataHandling();
            comboLoader.getPlayers();

            if (comboLoader.Err != "0")
            {
                MessageBox.Show(comboLoader.Err);
                return;
            }

            for (int i = 0; i < comboLoader.Dt.Rows.Count; i++)
            {
                DataRow row = comboLoader.Dt.Rows[i];
                cmbPlayers.Items.Add(row["playerID"] + " " + row["firstname"] + " " + row["lastname"]);
            }
        }

        // Get the player data when combobox is selected and print to the textboxes. 
        private void cmbPlayer_SelectedIndexChanged(object sender, EventArgs e)
        {
            string sId, sCmb;
            string dateText = "";

            sCmb = cmbPlayers.SelectedItem.ToString();
            sId = sCmb.Split(' ')[0];
            lblID.Text = sId;

            DataHandling dataInserter = new DataHandling();
            dataInserter.getPlayer(sId);
            dataInserter.getScore(sId);

            DataRow rowDI = dataInserter.Dt.Rows[0];

            txtFirstName.Text = rowDI["firstname"].ToString();
            txtLastName.Text = rowDI["lastname"].ToString();
            txtEmail.Text = rowDI["email"].ToString();
            lblEmailUnvisible.Text = rowDI["email"].ToString();
            txtPassword.Text = rowDI["password"].ToString();
            txtPoints.Text = rowDI["points"].ToString();

            if (rowDI["date"].ToString() != "")
            {
                txtDate.Text = dataInserter.dbDataToForm(rowDI["date"].ToString());
                dateText = txtDate.Text;
            }
            else if (rowDI["date"].ToString() == "")
            {
                dateText = "";
            }

            txtDate.Text = dateText;
            cmbScores.Text = rowDI["points"].ToString() + " " + dateText;

            cmbScores.Items.Clear();

            DataHandling ScoreInserter = new DataHandling();
            ScoreInserter.getScore(sId);

            for (int i = 0; i < ScoreInserter.Dt.Rows.Count; i++)
            {
                DataRow rowSI = ScoreInserter.Dt.Rows[i];
                cmbScores.Items.Add(rowSI["points"] + "  " + ScoreInserter.dbDataToForm(rowSI["date"].ToString()));
            }

        }

        // Get score data from the database and print to the combobox.
        private void cmbScores_SelectedIndexChanged(object sender, EventArgs e)
        {
            string sDate, sCmbScore;

            sCmbScore = cmbScores.SelectedItem.ToString();
            sDate = sCmbScore.Split(' ')[2];

            DataHandling scoreInserter = new DataHandling();
            string sData = scoreInserter.formDataToDatabase(sDate);
            scoreInserter.getDateScore(lblID.Text, sData);
            DataRow row = scoreInserter.Dt.Rows[0];
            string sFormData = scoreInserter.dbDataToForm(row["date"].ToString());

            txtDate.Text = sFormData;
            txtPoints.Text = row["points"].ToString();
        }

        // Show a new player form and clear boxes data.
        private void btnNewPlayer_Click(object sender, EventArgs e)
        {
            var newPlayer = new frmNewPlayer();
            newPlayer.ShowDialog();

            clearForm();
            loadCombo();
        }

        // Update player by a player identifier. Check if email is same in textboxes or in the database.
        private void btnUpdatePlayer_Click(object sender, EventArgs e)
        {
            bool sameEmail = false;
            DataHandling playerUpdater = new DataHandling();

            if (lblID.Text == "")
            {
                MessageBox.Show("Select player first.");
                return;
            }
            else if (txtEmail.Text == lblEmailUnvisible.Text)
            {
                playerUpdater.updatePlayer(lblID.Text, txtFirstName.Text, txtLastName.Text, txtEmail.Text, txtPassword.Text);
                MessageBox.Show("The Player has been updated to the database", "Player update", MessageBoxButtons.OK, MessageBoxIcon.Information);
                clearForm();
                loadCombo();
            }
            else
            {
                playerUpdater.getPlayers();

                if (playerUpdater.Err != "0")
                {
                    MessageBox.Show(playerUpdater.Err);
                    return;
                }

                for (int i = 0; i < playerUpdater.Dt.Rows.Count; i++)
                {
                    DataRow row = playerUpdater.Dt.Rows[i];
                    if (txtEmail.Text == row["email"].ToString())
                    {
                        sameEmail = true;
                        break;
                    }
                }

                if (sameEmail)
                {
                    MessageBox.Show("The email is already used.", "Player update", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
                    playerUpdater.Dt.Clear();
                }
                else
                {
                    playerUpdater.updatePlayer(lblID.Text, txtFirstName.Text, txtLastName.Text, txtEmail.Text, txtPassword.Text);

                    if (playerUpdater.Err != "0")
                    {
                        MessageBox.Show(playerUpdater.Err);
                        return;
                    }
                    MessageBox.Show("The Player has been updated to the database", "Player update", MessageBoxButtons.OK, MessageBoxIcon.Information);
                    clearForm();
                    loadCombo();
                }
            }
        }

        // Clear the information from the form.
        private void btnClearForm_Click(object sender, EventArgs e)
        {
            clearForm();
            loadCombo();
        }

        // Remove the player by player identifier.
        private void btnRemovePlayer_Click(object sender, EventArgs e)
        {
            if (lblID.Text == "")
            {
                MessageBox.Show("Select player first.");
                return;
            }

            if (MessageBox.Show("Are you sure you want to remove the player?", "Remove", MessageBoxButtons.YesNo, MessageBoxIcon.Warning) == DialogResult.No)
            {
                return;
            }
            else
            {
                DataHandling playerRemover = new DataHandling();
                playerRemover.removePlayer(lblID.Text);
                playerRemover.removePlayerScores(lblID.Text);

                if (playerRemover.Err != "0")
                {
                    MessageBox.Show(playerRemover.Err);
                    return;
                }

                MessageBox.Show("The player has been removed", "Removed", MessageBoxButtons.OK, MessageBoxIcon.Information);

                clearForm();
                loadCombo();
            }
        }

        // Create a new score in the score table
        private void btnNewScore_Click(object sender, EventArgs e)
        {
            var newScore = new frmNewScore();
            newScore.ShowDialog();

            clearForm();
            loadCombo();
        }

        // Check the availability of the score in the database and update the current score with date and identifier.
        private void btnUpdateScore_Click(object sender, EventArgs e)
        {
            if (lblID.Text == "")
            {
                MessageBox.Show("Select player first.");
                return;
            }

            bool found = false;

            DataHandling scoreChecker = new DataHandling();
            scoreChecker.getScore(lblID.Text);

            for (int i = 0; i < scoreChecker.Dt.Rows.Count; i++)
            {
                DataRow row = scoreChecker.Dt.Rows[i];
                string sDate = scoreChecker.dbDataToForm(row["date"].ToString());
                if (sDate != txtDate.Text)
                {
                    continue;
                }
                else
                {
                    found = true;
                }

            }

            if (found)
            {
                DataHandling scoreUpdater = new DataHandling();
                string sDate = scoreUpdater.formDataToDatabase(txtDate.Text);
                scoreUpdater.updateScore(lblID.Text, txtEmail.Text, sDate, txtPoints.Text);

                if (scoreUpdater.Err != "0")
                {
                    MessageBox.Show(scoreUpdater.Err);
                    return;
                }

                MessageBox.Show("The Score information has been updated", "Score update", MessageBoxButtons.OK, MessageBoxIcon.Information);

                clearForm();
                loadCombo();
            }
            else
            {
                MessageBox.Show("There is no score on this date. Add a new score or check the correct date.");
                return;
            }
        }

        // Clears the form.
        private void clearForm()
        {
            lblResultTable.Text = "Result Table";
            txtPassword.Text = "";
            txtEmail.Text = "";
            txtLastName.Text = "";
            txtFirstName.Text = "";
            txtBeginDate.Text = "";
            txtEndDate.Text = "";
            lblID.Text = "";
            cmbPlayers.Text = "";
            cmbScores.Text = "";
            txtPoints.Text = "";
            txtDate.Text = "";
            lbResultTable.Items.Clear();
            cmbPlayers.Items.Clear();
            cmbScores.Items.Clear();
        }

        // Deletes the score using the date.
        private void btnRemoveScore_Click(object sender, EventArgs e)
        {
            if (lblID.Text == "")
            {
                MessageBox.Show("Select player first.");
                return;
            }

            if (MessageBox.Show("Are you sure you want to remove the score?", "Remove", MessageBoxButtons.YesNo, MessageBoxIcon.Warning) == DialogResult.No)
            {
                return;
            }
            else
            {
                DataHandling scoreRemover = new DataHandling();
                string sDate = scoreRemover.formDataToDatabase(txtDate.Text);
                scoreRemover.removeScore(lblID.Text, sDate);

                if (scoreRemover.Err != "0")
                {
                    MessageBox.Show(scoreRemover.Err);
                    return;
                }

                MessageBox.Show("The score has been removed", "Removed", MessageBoxButtons.OK, MessageBoxIcon.Information);

                clearForm();
                loadCombo();
            }
        }

        // Shows the current player ranking in form.
        private void btnRanking_Click(object sender, EventArgs e)
        {
            lbResultTable.Items.Clear();

            DataHandling rankingInserter = new DataHandling();
            rankingInserter.getRanking();

            if (rankingInserter.Err != "0")
            {
                MessageBox.Show(rankingInserter.Err);
                return;
            }

            lblResultTable.Text = "Current Ranking (Name and points)";

            for (int i = 0; i < rankingInserter.Dt.Rows.Count; i++)
            {
                DataRow row = rankingInserter.Dt.Rows[i];
                lbResultTable.Items.Add(row["firstname"] + " " + row["lastname"] + ", " + row["max_points"] + ".");
            }
        }

        // Shows the player's result history on the form
        private void btnShowHistory_Click(object sender, EventArgs e)
        {
            if (lblID.Text == "")
            {
                MessageBox.Show("Select player first.");
                return;
            }

            if (txtBeginDate.Text == "" || txtEndDate.Text == "")
            {
                MessageBox.Show("Begin and end dates are required.");
                return;
            }

            lbResultTable.Items.Clear();

            DataHandling historyGetter = new DataHandling();
            string sBeginDate = historyGetter.formDataToDatabase(txtBeginDate.Text);
            string sEndDate = historyGetter.formDataToDatabase(txtEndDate.Text);
            historyGetter.getHistory(lblID.Text, sBeginDate, sEndDate);

            if (historyGetter.Err != "0")
            {
                MessageBox.Show(historyGetter.Err);
                return;
            }

            lblResultTable.Text = "Point History (Name, points, and date).";

            for (int i = 0; i < historyGetter.Dt.Rows.Count; i++)
            {
                DataRow row = historyGetter.Dt.Rows[i];
                string sDate = historyGetter.dbDataToForm(row["date"].ToString());
                lbResultTable.Items.Add(row["firstname"] + " " + row["lastname"] + ", " + row["points"] + ", " + sDate + ".");
            }
        }

        // Prints the ranking status or the player's point history to a PDF file.
        private void btnPrintPDF_Click(object sender, EventArgs e)
        {
            if (MessageBox.Show("Do you want to print a PDF file of the player rankings?", "Print PDF-file", MessageBoxButtons.YesNo, MessageBoxIcon.Information) == DialogResult.Yes)
            {
                string folder = "MyPlayersPDF";
                DataHandling PDFprinter = new DataHandling();
                PDFprinter.getRanking();

                if (PDFprinter.Err != "0")
                {
                    MessageBox.Show(PDFprinter.Err);
                    return;
                }

                // Must have write permissions to the path folder.
                if (!Directory.Exists(@"C:\" + folder))
                {
                    Directory.CreateDirectory(@"C:\" + folder);
                }

                PdfWriter writer = new PdfWriter("C:\\" + folder + "\\Ranking.pdf");
                PdfDocument pdf = new PdfDocument(writer);
                Document document = new Document(pdf);
                Paragraph header = new Paragraph("RANKING").SetTextAlignment(TextAlignment.CENTER).SetFontSize(20);
                Paragraph line = new Paragraph("(name, points)").SetTextAlignment(TextAlignment.CENTER).SetFontSize(15);

                document.Add(header);
                document.Add(line);

                for (int i = 0; i < PDFprinter.Dt.Rows.Count; i++)
                {
                    DataRow row = PDFprinter.Dt.Rows[i];
                    Paragraph player = new Paragraph(row["firstname"] + " " + row["lastname"] + ", " + row["max_points"] + ".").SetTextAlignment(TextAlignment.CENTER);
                    document.Add(player);
                }

                MessageBox.Show("The Ranking have been printed in a folder " + folder + ".");
                document.Close();
            }

            if (MessageBox.Show("Do you want to print a PDF file of the player's point history?", "Print PDF-file", MessageBoxButtons.YesNo, MessageBoxIcon.Information) == DialogResult.Yes)
            {
                if (lblID.Text == "")
                {
                    MessageBox.Show("Select player first.");
                    return;
                }

                if (txtBeginDate.Text == "" || txtEndDate.Text == "")
                {
                    MessageBox.Show("Begin and end dates are required for PDF printing.");
                    return;
                }


                DataHandling PDFprinter = new DataHandling();
                string sBeginDate = PDFprinter.formDataToDatabase(txtBeginDate.Text);
                string sEndDate = PDFprinter.formDataToDatabase(txtEndDate.Text);
                PDFprinter.getHistory(lblID.Text, sBeginDate, sEndDate);

                if (PDFprinter.Err != "0")
                {
                    MessageBox.Show(PDFprinter.Err);
                    return;
                }

                string folder = "MyPlayersPDF";

                // Must have write permissions to the path folder.
                if (!Directory.Exists(@"C:\" + folder))
                {
                    Directory.CreateDirectory(@"C:\" + folder);
                }

                PdfWriter writer = new PdfWriter("C:\\" + folder + "\\" + txtFirstName.Text + "_" + txtLastName.Text + ".pdf");
                PdfDocument pdf = new PdfDocument(writer);
                Document document = new Document(pdf);
                Paragraph header = new Paragraph("PLAYER " + txtFirstName.Text.ToUpper() + " " + txtLastName.Text.ToUpper() + " HISTORY").SetTextAlignment(TextAlignment.CENTER).SetFontSize(20);
                Paragraph line = new Paragraph("(name, points, and date)").SetTextAlignment(TextAlignment.CENTER).SetFontSize(15);

                document.Add(header);
                document.Add(line);

                for (int i = 0; i < PDFprinter.Dt.Rows.Count; i++)
                {
                    DataRow row = PDFprinter.Dt.Rows[i];
                    string sDate = PDFprinter.dbDataToForm(row["date"].ToString());
                    Paragraph player = new Paragraph(row["firstname"] + " " + row["lastname"] + ", " + row["points"] + ", " + sDate + ".").SetTextAlignment(TextAlignment.CENTER);
                    document.Add(player);
                }
                MessageBox.Show("The Player history have been printed in a folder " + folder + ".");
                document.Close();
            }
        }
    }
}
