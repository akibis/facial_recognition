/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package QueryDatabase;

import com.mysql.jdbc.Connection;
import java.io.IOException;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.logging.Level;
import java.util.logging.Logger;
import jdk.nashorn.internal.runtime.Version;

/**
 *
 * @author rusky
 */
public class Facial_Recognition {

    /**
     * @param args the command line arguments
     * @throws java.io.IOException
     */
    public static void main(String[] args) throws IOException {
        // TODO code application logic here
        System.out.println("Connecting to Database.");
        
        Connection con = null;
        Statement st = null;
        ResultSet rs = null;

        String url = "jdbc:mysql://52.11.86.64:3306/facial_recognition";
        
        // ##### YOUR USERNAME #####
        String user = "";
        
        // ##### YOUR PASSWORD #####
        String password = "";

        try {
            con = (Connection) DriverManager.getConnection(url, user, password);
            System.out.println("Connection Successful!");
            
            // ##### ADD YOUR QUERY #####
            String myQuery = "SELECT address FROM contact";
            
            System.out.println("Running query: " + myQuery);
            st = con.createStatement();
            rs = st.executeQuery(myQuery);

            if (rs.next()) {
                System.out.println(rs.getString(1));
            }

        } catch (SQLException ex) {
            Logger lgr = Logger.getLogger(Version.class.getName());
            lgr.log(Level.SEVERE, ex.getMessage(), ex);

        } finally {
            try {
                if (rs != null) {
                    rs.close();
                }
                if (st != null) {
                    st.close();
                }
                if (con != null) {
                    con.close();
                }

            } catch (SQLException ex) {
                Logger lgr = Logger.getLogger(Version.class.getName());
                lgr.log(Level.WARNING, ex.getMessage(), ex);
            }
        }
    }
    
}
