package publisher;

import service.BookServiceImpl;

import javax.jws.WebService;
import javax.xml.ws.Endpoint;

@WebService()
public class SoapPublisher {

    public static void main(String[] argv) {
        Object implementor = new BookServiceImpl();
        String address = "http://localhost:9000/BookService";
        Endpoint.publish(address, implementor);
    }

}

